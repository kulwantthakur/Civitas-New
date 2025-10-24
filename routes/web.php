<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RdpController;

use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\AdminPodcastController;
use App\Http\Controllers\AmissfsController;
use App\Http\Controllers\CivitasController;
use App\Http\Controllers\KeywordController;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\LoadMoreController;
use App\Http\Controllers\SoutenirController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\PodcastCategoryController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ---------- Auth ----------
Auth::routes(['login' => false]);
Route::get('/ap-login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/ap-login', [LoginController::class, 'login']);
Route::group(['middleware' => ['auth']], function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

// ---------- Root: redirect to default locale (/fr) ----------
Route::get('/', function () {
    return redirect(LaravelLocalization::localizeURL('/accueil'));
});

// ---------- Payrexx Webhook (OUTSIDE localization group) ----------
Route::post('/webhook/payrexx', [SubscriptionController::class, 'handleWebhook']);

// ---------- Dev helper (local only): optimize ----------
Route::get('/optimize', function () {
    if (app()->environment('local')) {
        \Artisan::call('optimize:clear');
        return '<h3>✅ Cleared caches (no re-cache)</h3>';
    }
    abort(403, 'Unauthorized');
});


// ---------- Catch-all: redirect any URL without locale to a localized URL ----------
Route::get('{any}', function ($any) {
    return redirect(LaravelLocalization::localizeURL('/' . ltrim($any, '/')));
})->where('any', '^(?!fr($|/)|de($|/)|it($|/)|optimize$|webhook/payrexx$).*$');


// // -------- Admin (Import Pages) --------
// Route::prefix('admin')->middleware('auth')->group(function () {
//     // Import Pages Interface
//     Route::get('/import/pages', [ImportController::class, 'index'])->name('admin.import.pages');
//     Route::post('/import/pages/preview', [ImportController::class, 'preview'])->name('admin.import.pages.preview');
//     Route::post('/import/pages/import', [ImportController::class, 'import'])->name('admin.import.pages.import');
//     Route::post('/import/check-directory', [ImportController::class, 'checkDirectory'])->name('admin.import.check-directory');
// });


// ---------- Localized routes (/fr, /de, /it) ----------
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [
            'localeSessionRedirect',
            'localizationRedirect',
            'localeViewPath',
            // Force FR for everything except an allow-list (e.g., /{locale}/language)
            'forceFrenchExceptAllowed',
        ],
    ],
    function () {


        // -------- Admin (auth) --------
        Route::middleware(['auth'])->controller(AdminController::class)->group(function () {
            Route::get('/account', 'account')->name('account');
            Route::post('/updatePassword', 'updatePassword')->name('updatePassword');
        });
        
        // -------- Admin (Import Pages) --------
        // Import Pages Interface
        Route::get('/import/pages', [ImportController::class, 'index'])->name('admin.import.pages');
        Route::post('/import/pages/preview', [ImportController::class, 'preview'])->name('admin.import.pages.preview');
        Route::post('/import/pages/import', [ImportController::class, 'import'])->name('admin.import.pages.import');
        Route::post('/import/check-directory', [ImportController::class, 'checkDirectory'])->name('admin.import.check-directory');

        // -------- Admin (Import Podcasts) --------
        // Import Podcasts Interface
        Route::get('/import/podcasts', [AdminPodcastController::class, 'index'])->name('admin.import.podcasts');
        Route::post('/import/podcasts/preview', [AdminPodcastController::class, 'preview'])->name('admin.import.podcasts.preview');
        Route::post('/import/podcasts/import', [AdminPodcastController::class, 'import'])->name('admin.import.podcasts.import');
        Route::post('/import/podcasts/check-directory', [AdminPodcastController::class, 'checkDirectory'])->name('admin.import.podcasts.check-directory');


        
        // -------- Donation --------
        Route::post('/donation-store', [DonationController::class, 'storeDonation'])->name('donation-store');

        // -------- Payrexx Payments (pages) --------
        Route::get('/subscription/create-payment', [SubscriptionController::class, 'createPayment'])->name('subscription.createPayment');
        Route::get('/payment/success/{id}', [SubscriptionController::class, 'paymentSuccess'])->name('payment.success');
        Route::get('/payment/fail/{id}', [SubscriptionController::class, 'paymentFail'])->name('payment.fail');

        // -------- Store / Update --------
        Route::resource('page-store', AdminController::class)->only(['store', 'update']);
        Route::post('/delete-item', [AdminController::class, 'deleteItem'])->name('delete.item');

        Route::resource('podcast-store', PodcastCategoryController::class)->only(['store', 'update']);
        Route::post('/delete-podcast', [PodcastCategoryController::class, 'deleteItem'])->name('delete.podcast');

        Route::resource('keyword-store', KeywordController::class)->only(['store', 'update']);
        Route::post('/delete-keyword', [KeywordController::class, 'deleteItem'])->name('delete.keyword');

        Route::resource('podcast-specific-store', PodcastController::class)->only(['store', 'update']);
        Route::post('/delete-specific-podcast', [PodcastController::class, 'deleteItem'])->name('delete.specific.podcast');

        // -------- Forms / Soutenir (AJAX) --------
        Route::post('/submit-form', [FormsController::class, 'storeForm'])->name('submit-form');
        Route::post('/store-value', [SoutenirController::class, 'storeValue'])->name('store.value');

        // -------- Membership --------
        Route::post('/membership-store', [MembershipController::class, 'storeMembership'])->name('membership-store');

        // -------- Filter (Amissfs) --------
        Route::get('/filter-results/{sectionId}', [AmissfsController::class, 'filterResults']);

        // -------- Home --------
        Route::controller(HomeController::class)->group(function () {
            Route::get('/accueil', 'home')->name('home');

            // -------- Language (allowed in non-FR locales) --------
            Route::get('/language', 'language')->name('language');

            Route::get('/suisse/impressum', 'impressum')->name('footer.impressum');
            Route::get('/suisse/protection-des-donnees', 'protection')->name('footer.protection');
            Route::get('/suisse/contact', 'contact')->name('footer.contact');
            Route::get('/suisse/conditions-generales', 'cgu')->name('footer.cgu');

            // Slider
            Route::get('/international/agir', 'homeSengager')->name('slider.sengager');
            Route::get('/amis-sfs/contempler-etudier', 'homeEtudier')->name('slider.etudier');
            Route::get('/rdp/exercices-prier', 'homePrier')->name('slider.prier');
            Route::get('/suisse/agir-confederation', 'homeAgir')->name('slider.agir');
        });

        // -------- Civitas --------
        Route::controller(CivitasController::class)->group(function () {
            Route::get('/suisse/accueil', 'home')->name('civitas.home');

            // New Page
            Route::get('/suisse/leon-xiii-humanum-genus', 'civitasNewPage')->name('civitas.newpage');

            // Newsletter
            Route::get('/suisse/newsletter-inscription', 'civitasNewsletter')->name('civitas.newsletter');

            // News
            Route::get('/suisse/actualites', 'civitasNews')->name('civitas.news');
            Route::get('/suisse/actualites/{url}', 'civitasCategoriesNews')->name('civitas.categories.news');
            Route::get('/suisse/actualites/{url}/{title}', 'civitasHeadline')->name('civitas.newsheadline');

            // Programme & Vote
            Route::get('/suisse/le-vote-catholique', 'civitasCatholicVote')->name('catholic-vote');
            Route::get('/suisse/le-programme-politique-du-christ-roi', 'politicalProgramHome')->name('political-program-home');
            Route::get('/suisse/le-programme-politique-du-christ-roi/cantons-catholiques', 'restorationCatholic')->name('restoration');
            Route::get('/suisse/le-programme/vision-generale/themes', 'politicalPrograms')->name('political-programs');
            Route::get('/civitas/programme/themes/but/{wordA}/{wordB?}', 'programs')->name('programs');

            // Participer
            Route::get('/suisse/mouvement/adhesion/devoir-d-etat', 'civitasParticiper')->name('civitas.participer');

            // Participer & Pages
            Route::get('/suisse/mouvement/questions-et-reponses-generales', 'civitasJoin')->name('civitas.join');
            Route::get('/international/suisse/reseaux-sociaux', 'civitasSocial')->name('civitas.social');
            Route::get('/internationa/{caritas}', 'civitasGetInform')->name('civitas.get_inform');

            // Become member (Figma)
            Route::get('/suisse/mouvement/adhesion', 'civitasMember')->name('civitas.member');
            Route::get('/mouvement/avantages-membres-et-amis', 'civitasAdvantages')->name('civitas.advantages');

            // Membership
            Route::get('/suisse/mouvement/adhesion/transfert', 'civitasMembership')->name('civitas.membership');

            // Agenda
            Route::get('/suisse/agenda/{range?}', 'civitasagenda')->name('civitas.agenda');

            // Party
            Route::get('/suisse/mouvement', 'partyHome')->name('civitas.party');
            Route::get('/suisse/mouvement/heritage', 'partyLegacy')->name('civitas.legacy');
            Route::get('/suisse/mouvement/questions-et-reponses-pratiques', 'partyQuestions')->name('civitas.question');
            Route::get('/suisse/groupes-diocesains', 'partyDiocesains')->name('civitas.diocesains');

            // AJAX - Canton
            Route::get('/groupes-diocesains/results', 'partyDiocesains')->name('getCantonResults');

            Route::get('/suisse/mouvement/comite-directeur', 'partyDirector')->name('civitas.director');
            Route::get('/suisse/mouvement/statuts-et-communiques', 'partyStatus')->name('civitas.status');
            Route::get('/suisse/communique/{url}', 'partyStatusPAGE')->name('civitas.statuspage');
            Route::get('/suisse/la-vie-du-mouvement', 'partyLife')->name('civitas.life');

            // Initiatives
            Route::get('/suisse/democratie-directe', 'civitasInitiatives')->name('civitas.initiatives');
            Route::get('/suisse/democratie.directe/{category}', 'civitasVotesOverview')->name('civitas.votes_overview');
            Route::get('/suisse/democratie.directe/{category}/{url}', 'civitasSliderPages')->name('civitas.voting');

            // EVENTS
            Route::get('/suisse/conferences', 'civitasEventsOverview')->name('civitas.events');
            Route::get('/suisse/conferences/{created_at}/{user_name}/{title}', 'civitasNextEvent')->name('civitas.next-event');
            Route::get('/suisse/conferences/{created_at}/{user_name}/{title}/inscription', 'civitasEventDetails')->name('civitas.event-detail');
            Route::get('/suisse/conferences/evenements-passes', 'civitasPastEvents')->name('civitas.last-event');

            // Soutenir (before)
            Route::get('/suisse/don/informations', 'goalSupport')->name('civitas.goal');
            Route::get('/suisse/don', 'civitasSupport')->name('civitas.support');

            // Soutenir (payment)
            Route::get('/suisse/don/transfert', 'civitasSoutenir')->name('civitas.soutenir');
            Route::get('/payment/versement_e-banking', 'soutenirPaymentEbanking')->name('civitas.soutenir_ebanking');
            Route::get('/payment/bulletin_de_versement', 'soutenirPaymentReceipt')->name('civitas.soutenir_receipt');
            Route::get('/payment/monero', 'soutenirPaymentCrypto')->name('civitas.soutenir_crypto');

            // General Info (payment)
            Route::get('/suisse/etude-anti-moderniste-et-contrerevolutionnaire', 'civitasStudy')->name('civitas.study');
            Route::get('/suisse/action-politique-et-souci-du-bien-commun', 'civitasPoliticalAction')->name('political-action');
            Route::get('/suisse/defense-de-la-foi-et-de-la-sainte-messe', 'civitasFaith')->name('civitas.faith');

            // Member payment
            Route::get('/payment/member/versement_e-banking', 'memberPaymentEbanking')->name('civitas.member_ebanking');
            Route::get('/payment/member/bulletin_de_versement', 'memberPaymentReceipt')->name('civitas.member_receipt');
            Route::get('/payment/member/monero', 'memberPaymentCrypto')->name('civitas.member_crypto');
        });

        // -------- LoadMore --------
        Route::controller(LoadMoreController::class)->group(function () {
            Route::get('/load-more', 'loadMoreSection')->name('loadMore');
            Route::get('/load-more-category', 'loadMoreCategory')->name('loadMoreCategory');
        });

        // -------- Amissfs --------
        Route::controller(AmissfsController::class)->group(function () {
            Route::get('/amis-s-f-s/accueil', 'home')->name('amissfs.home');

            // Subcategories
            Route::get('/amis-s-f-s/a-propos', 'association')->name('association');
            Route::get('/amis-s-f-s/editions', 'editions')->name('editions');
            Route::get('/amis-s-f-s/bulletin', 'bulletin')->name('bulletin');
            Route::get('/amis-s-f-s/rom-kurier', 'romKurier')->name('rom-kurier');
            Route::get('/amis-s-f-s/editions/en-construction', 'bookStore')->name('bookStore');
            Route::get('/amis-s-f-s/dons', 'dons')->name('dons');

            // Pages of subcategories
            Route::get('/amis-s-f-s/a-propos/activites', 'associationpage')->name('association-page');
            Route::get('/amis-s-f-s/bulletin/numero-{number}', 'lebulletinDownload')->name('le-bulletin-download');
            Route::get('/amis-s-f-s/bulletin/archives', 'lebulletinArchive')->name('le-bulletin-archive');
            Route::get('/amis-s-f-s/bulletin/past/numero-{number}', 'lebulletinArchivePast')->name('le-bulletin-archive-past');
            Route::get('/amis-s-f-s/bulletin/commander', 'lebulletinCommander')->name('le-bulletin-commander');

            Route::get('/amis-s-f-s/rom-kurier/numero-{number}', 'romKurierDownload')->name('rom-kurier-download');
            Route::get('/amis-s-f-s/rom-kurier/archives', 'romKurierArchive')->name('rom-kurier-archive');
            Route::get('/amis-s-f-s/rom-kurier/past/numero-{number}', 'romKurierArchivePast')->name('rom-kurier-archive-past');
            Route::get('/amis-s-f-s/rom-kurier/commander ', 'romKurierCommander')->name('rom-kurier-commander');

            // Newsletter
            Route::get('/amis-s-f-s/newsletter/inscription', 'amissfsNewsletter')->name('amissfs-newsletter');

            // Contact
            Route::get('/amis-s-f-s/contact', 'amissfsContact')->name('amissfs-contact');

            // Podcast
            Route::get('/amis-s-f-s/audiothèque/', 'podcasts')->name('podcasts');
            Route::get('/amissfs/podcasts/{url}', 'getCategoryPodcast')->name('podcast-subcategory');
            Route::get('/amissfs/podcasts/{categoryUrl}/{podcastUrl}', 'getPodcast')->name('podcast-name');
            Route::get('/amissfs/history', 'history')->name('podcast-history');

            Route::get('/podcast-search', 'search')->name('podcast-search');
        });

        // -------- RDP --------
        Route::controller(RdpController::class)->group(function () {
            Route::get('/rdp/accueil', 'home')->name('rdp.home');

            // Subcategories
            Route::get('/rdp/qu-est-ce-que-le-rosaire', 'leRosaire')->name('lerosaire');
            Route::get('/rdp/catechisme', 'catechisme')->name('catechisme');
            Route::get('/rdp/fatima', 'notreDame')->name('notredame');
            Route::get('/rdp/scapulaire-du-mont-carmel', 'leScapulaire')->name('lescapulaire');
            Route::get('/rdp/cinq-premiers-samedis-du-mois', 'lerSamedis')->name('lersamedis');
            Route::get('/rdp/le-secret', 'leSecret')->name('lesecret');

            // Comment prier le rosaire
            Route::get('/rdp/pourquoi-prier-le-rosaire ', 'prierleRosaire')->name('prier-lerosaire');
            Route::get('/rdp/comment-prier-le-rosaire ', 'commentleRosaire')->name('comment-lerosaire');

            // Months
            Route::get('/rdp/13-septembre', 'rdpSeptember')->name('rdp-septembre');
            Route::get('/rdp/19-aout', 'rdpAugustSec')->name('rdp-aout');
            Route::get('/rdp/13-aout', 'rdpAugust')->name('rdp-aout-13');
            Route::get('/rdp/13-juilliet', 'rdpJuly')->name('rdp-juillet');
            Route::get('/rdp/13-october', 'rdpOctober')->name('rdp-october');
            Route::get('/rdp/13-juin', 'rdpJune')->name('rdp-june');
            Route::get('/rdp/13-mai', 'rdpMay')->name('rdp-may');
            Route::get('/rdp/apparitions-de-l-ange', 'rdpAngel')->name('rdp-angel');
            Route::get('/rdp/armee-bleue-du-coeur-immacule/historique', 'historique')->name('historique');
            Route::get('/rdp/armee-bleue-du-coeur-immacule/', 'coeurImmacule')->name('coeurImmacule');

            Route::get('/rdp/{url}', 'catechismeCategories')->name('catechisme.category');
        });
    }
);
