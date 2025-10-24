<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use League\CommonMark\CommonMarkConverter;
use Symfony\Component\Console\Output\BufferedOutput;

class ImportController extends Controller
{
    public function index()
    {
        // Get available users and sections for dropdowns
        $users = DB::table('users')->select('user_identifier', 'name', 'email')->get();
        $sections = DB::table('sections')->select('id', 'title')->where('is_active', 1)->get();

        // Find available bulletin directories
        $availablePaths = $this->findAvailablePaths();

        // Get existing pages count for reference
        $existingPagesCount = DB::table('pages')->count();

        return view('admin.import.index', compact('users', 'sections', 'availablePaths', 'existingPagesCount'));
    }

    public function preview(Request $request)
    {
        $request->validate([
            'source' => 'nullable|string',
            'user_id' => 'required|string',
            'section_id' => 'required|string',
            'category' => 'nullable|string',
            'limit' => 'nullable|integer|min:1|max:100',
            'duplicate_action' => 'required|in:skip,update',
        ]);

        $output = new BufferedOutput();

        $options = [
            '--dry-run' => true,
            '--user-id' => $request->user_id,
            '--section-id' => $request->section_id,
            '--duplicate-action' => $request->duplicate_action,
        ];

        if ($request->source) {
            $options['--source'] = $request->source;
        }

        if ($request->category) {
            $options['--category'] = $request->category;
        }

        if ($request->limit) {
            $options['--limit'] = $request->limit;
        }

        try {
            Artisan::call('pages:import', $options, $output);
            $result = $output->fetch();

            return response()->json([
                'success' => true,
                'output' => $result,
                'options' => $options,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function import(Request $request)
    {
        $request->validate([
            'source' => 'nullable|string',
            'user_id' => 'required|string',
            'section_id' => 'required|string',
            'category' => 'nullable|string',
            'limit' => 'nullable|integer|min:1|max:100',
            'duplicate_action' => 'required|in:skip,update',
        ]);

        $output = new BufferedOutput();

        $options = [
            '--user-id' => $request->user_id,
            '--section-id' => $request->section_id,
            '--duplicate-action' => $request->duplicate_action,
        ];

        if ($request->source) {
            $options['--source'] = $request->source;
        }

        if ($request->category) {
            $options['--category'] = $request->category;
        }

        if ($request->limit) {
            $options['--limit'] = $request->limit;
        }

        try {
            Artisan::call('pages:import', $options, $output);
            $result = $output->fetch();

            $newPagesCount = DB::table('pages')->count();

            return response()->json([
                'success' => true,
                'output' => $result,
                'options' => $options,
                'new_pages_count' => $newPagesCount,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function checkDirectory(Request $request)
    {
        $path = $request->input('path');

        if (!$path) {
            return response()->json(['success' => false, 'error' => 'Path is required']);
        }

        $fullPath = $path;
        if (!str_starts_with($path, '/')) {
            $fullPath = base_path($path);
        }

        if (!File::isDirectory($fullPath)) {
            return response()->json([
                'success' => false,
                'exists' => false,
                'message' => "Directory does not exist: {$fullPath}",
            ]);
        }

        $bulletinFolders = File::directories($fullPath);
        $folderNames = array_map('basename', $bulletinFolders);

        // Check for bulletin.txt files
        $validFolders = [];
        foreach ($bulletinFolders as $folder) {
            $bulletinFile = $folder . '/bulletin.txt';
            if (File::exists($bulletinFile)) {
                $validFolders[] = basename($folder);
            }
        }

        return response()->json([
            'success' => true,
            'exists' => true,
            'total_folders' => count($folderNames),
            'valid_folders' => count($validFolders),
            'folder_names' => array_slice($folderNames, 0, 10),  // Show first 10
            'valid_folder_names' => array_slice($validFolders, 0, 10),  // Show first 10 valid
        ]);
    }

    public function markdownPreview(Request $request)
    {
        $request->validate([
            'markdown' => 'required|string',
        ]);

        $converter = new CommonMarkConverter();
        $html = $converter->convert($request->markdown);

        return response()->json([
            'success' => true,
            'html' => $html,
        ]);
    }

    private function findAvailablePaths()
    {
        $possiblePaths = [
            'import/bulletins' => 'Project Root: import/bulletins',
            'public/import/bulletins' => 'Public: public/import/bulletins',
            'storage/app/import/bulletins' => 'Storage: storage/app/import/bulletins',
            'resources/import/bulletins' => 'Resources: resources/import/bulletins',
        ];

        $availablePaths = [];

        foreach ($possiblePaths as $path => $label) {
            $fullPath = base_path($path);
            if (File::isDirectory($fullPath)) {
                $folderCount = count(File::directories($fullPath));
                $availablePaths[$path] = $label . " ({$folderCount} folders)";
            }
        }

        return $availablePaths;
    }
}
