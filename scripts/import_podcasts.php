<?php
// scripts/import_podcasts.php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

require __DIR__ . '/../vendor/autoload.php';

// Bootstrap Laravel application & facades
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// --------- Ρυθμίσεις ----------
$csvPath = __DIR__ . '/podcasts_for_import.csv'; // το CSV που έχεις βάλει στον φάκελο scripts
$basePublicPath = public_path('site/podcast'); // public/site/podcast
$dryRun = false; // βάλε true για δοκιμή χωρίς INSERT/φακέλους

// --------- Helpers ----------
function toNull($v)
{
    if (!isset($v)) return null;
    $v = trim((string)$v);
    return ($v === '' || strtoupper($v) === 'NULL') ? null : $v;
}

function dateToSql($dmy)
{
    // περιμένουμε d.m.Y (π.χ. 25.02.2002)
    $dmy = toNull($dmy);
    if ($dmy === null) return null;
    // fallback: δέξου και Y-m-d αν έχει ήδη σωστή μορφή
    if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $dmy)) return $dmy;
    if (!preg_match('/^\d{2}\.\d{2}\.\d{4}$/', $dmy)) return null;
    [$d, $m, $y] = explode('.', $dmy);
    return sprintf('%04d-%02d-%02d', (int)$y, (int)$m, (int)$d);
}

if (!file_exists($csvPath)) {
    fwrite(STDERR, "❌ Δεν βρέθηκε το αρχείο CSV: $csvPath\n");
    exit(1);
}

// 1) Φέρε όλες τις κατηγορίες μία φορά (name → [id, identifier])
$categories = DB::table('podcast_categories')->select('id', 'name', 'podcast_category_identifier')->get();
$catIndex = [];
foreach ($categories as $c) {
    // αντιστοίχιση με ακριβές όνομα (trim/case-sensitive όπως το CSV σου)
    $catIndex[trim($c->name)] = ['id' => $c->id, 'ident' => $c->podcast_category_identifier];
}

// 2) Διάβασε CSV
$fh = fopen($csvPath, 'r');
$header = fgetcsv($fh);
if (!$header) {
    fwrite(STDERR, "❌ Κενό/άκυρο header στο CSV\n");
    exit(1);
}

// normalize keys -> ακριβώς όπως μου έστειλες
// url,category,title,author,description,date,place,date_from,date_to
$map = array_map('trim', $header);
$required = ['url', 'category', 'title', 'author', 'description', 'date', 'place', 'date_from', 'date_to'];
foreach ($required as $col) {
    if (!in_array($col, $map, true)) {
        fwrite(STDERR, "❌ Λείπει στήλη '$col' από το CSV header\n");
        exit(1);
    }
}

$idx = array_flip($map);

$ok = 0;
$skipped = 0;
$errors = 0;
$notFoundCategories = [];

while (($row = fgetcsv($fh)) !== false) {
    // Πάρε τιμές από γραμμή
    $categoryName = toNull($row[$idx['category']] ?? null);
    $url         = toNull($row[$idx['url']] ?? null);
    $title       = toNull($row[$idx['title']] ?? null);
    $author      = toNull($row[$idx['author']] ?? null);
    $description = toNull($row[$idx['description']] ?? null);
    $place       = toNull($row[$idx['place']] ?? null);
    $dateFrom    = dateToSql($row[$idx['date_from']] ?? null);
    $dateTo      = dateToSql($row[$idx['date_to']] ?? null);

    if (!$categoryName) {
        $skipped++;
        echo "⚠ Παράλειψη (no category): {$title}\n";
        continue;
    }
    if (!isset($catIndex[$categoryName])) {
        $skipped++;
        $notFoundCategories[$categoryName] = true;
        echo "⚠ Δεν βρέθηκε κατηγορία με name='{$categoryName}' στη DB. Παράλειψη: {$title}\n";
        continue;
    }

    $categoryId = $catIndex[$categoryName]['id'];
    $categoryIdent = $catIndex[$categoryName]['ident'];

    // Δημιούργησε Identifier όπως στο controller (PO- + uniqid('', true))
    // Προσαρμόζω το prefix σε PO- (όπως έδειξες). Αν θες PC-, άλλαξέ το εδώ.
    $podcastIdentifier = 'PO-' . uniqid('', true);

    // INSERT
    try {
        if (!$dryRun) {
            $podcastId = DB::table('podcasts')->insertGetId([
                'category_id'        => $categoryId,
                'podcast_identifier' => $podcastIdentifier,
                'url'                => $url,            // π.χ. "/BL2"
                'title'              => $title,
                'author'             => $author,
                'location'           => $place,         // place -> location
                'start_date'         => $dateFrom,      // 'YYYY-MM-DD' ή NULL
                'end_date'           => $dateTo,        // 'YYYY-MM-DD' ή NULL
                'description'        => $description,
                'is_active'          => 1,
                'is_deleted'         => 0,
                'created_at'         => now(),
                'updated_at'         => now(),
            ]);
        } else {
            $podcastId = 0;
        }

        // Δημιουργία φακέλων: public/site/podcast/{categoryIdent}/{podcastIdentifier}
        $categoryPath = rtrim($basePublicPath, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $categoryIdent;
        $podcastPath  = $categoryPath . DIRECTORY_SEPARATOR . $podcastIdentifier;

        if (!$dryRun) {
            if (!File::isDirectory($categoryPath)) {
                File::makeDirectory($categoryPath, 0777, true);
            }
            if (!File::isDirectory($podcastPath)) {
                File::makeDirectory($podcastPath, 0777, true);
            }
        }

        $ok++;
        echo "✅ INSERT " . ($podcastId ? "#$podcastId " : "") . " | '{$title}' | cat='{$categoryName}' → {$categoryIdent} | folder='{$podcastIdentifier}'\n";
    } catch (\Throwable $e) {
        $errors++;
        $msg = "❌ Σφάλμα INSERT για '{$title}': " . $e->getMessage() . "\n";
        echo $msg;
        file_put_contents(__DIR__ . '/import_errors.log', $msg, FILE_APPEND);
    }
}

fclose($fh);
echo "Row data: " . json_encode($row, JSON_UNESCAPED_UNICODE) . "\n";
echo "\n--- Σύνοψη ---\n";
echo "✅ Επιτυχίες: $ok\n";
echo "⚠ Παραλείφθηκαν: $skipped\n";
echo "❌ Σφάλματα: $errors\n";

if (!empty($notFoundCategories)) {
    echo "Κατηγορίες που δεν βρέθηκαν στη DB (name):\n";
    foreach (array_keys($notFoundCategories) as $n) {
        echo "  - $n\n";
    }
}
