<?php

use App\Http\Controllers\FaqController;
use App\Http\Controllers\HerosectionController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\SimsDecorController;
use App\Http\Controllers\Dashboard\ArchitectureController;
use App\Http\Controllers\Dashboard\QuincaillerieController;
use App\Http\Controllers\Dashboard\QuincaillerieCategoriesController;
use App\Http\Controllers\Dashboard\QuincaillerieRentalController;
use App\Models\Reference;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//$localizator = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

Route::get('/under-construction', function () {
    return view('pages.underconstruction');
})->name('underconstruction');

/* BACK OFFICE ROUTES */


/* PUBLICATIONS CONTROLLER ROUTES */

Route::get('/destroy-image', [App\Http\Controllers\Dashboard\PublicationController::class, 'destroyImage'])->name('destroy-image')->middleware('auth');

Route::get('/manage-ref', [App\Http\Controllers\Dashboard\PublicationController::class, 'manageRefs'])->name('manage-refs')->middleware('auth');
Route::get('/fetch-ref', [App\Http\Controllers\Dashboard\PublicationController::class, 'fetchRefs'])->name('fetch-refs')->middleware('auth');
Route::post('/save-ref', [App\Http\Controllers\Dashboard\PublicationController::class, 'saveRef'])->name('save-ref')->middleware('auth');
Route::put('/update-ref', [App\Http\Controllers\Dashboard\PublicationController::class, 'updateRef'])->name('update-ref')->middleware('auth');
Route::get('/show-ref', [App\Http\Controllers\Dashboard\PublicationController::class, 'showRef'])->name('show-ref')->middleware('auth');
Route::get('/destroy-ref', [App\Http\Controllers\Dashboard\PublicationController::class, 'destroyRef'])->name('delete-ref')->middleware('auth');
Route::get('/edit-ref', [App\Http\Controllers\Dashboard\PublicationController::class, 'editRef'])->name('edit-ref')->middleware('auth');

/* ARTICLES START */
Route::get('/manage-articles', [App\Http\Controllers\PubController::class, 'manageArticles'])->name('manage-articles')->middleware('auth');
Route::get('/fetch-articles', [App\Http\Controllers\PubController::class, 'fetchArticles'])->name('fetch-articles')->middleware('auth');
Route::post('/save-article', [App\Http\Controllers\PubController::class, 'saveArticle'])->name('save-article')->middleware('auth');
Route::get('/edit-article', [App\Http\Controllers\PubController::class, 'editArticle'])->name('edit-article')->middleware('auth');
Route::get('/destroy-article', [App\Http\Controllers\PubController::class, 'destroyArticle'])->name('destroy-article')->middleware('auth');
Route::get('/delete-article', [App\Http\Controllers\PubController::class, 'delArticle'])->name('delete-article')->middleware('auth');
Route::get('/show-article', [App\Http\Controllers\PubController::class, 'showArticle'])->name('show-article')->middleware('auth');
Route::put('/update-article', [App\Http\Controllers\PubController::class, 'updateArticle'])->name('update-article')->middleware('auth');
/* ARTICLES END */


/* END PUBLICATIONS CONTROLLER ROUTES */

Route::get('/fetch-archi', [App\Http\Controllers\Dashboard\ArchitectureController::class, 'fetch'])->name('fetch-archi')->middleware('auth');

Route::resource('architecture', ArchitectureController::class)->middleware('auth');
Route::resource('simsDecor', SimsDecorController::class)->middleware('auth');
Route::resource('quincaillerie', QuincaillerieController::class)->middleware('auth');
Route::resource('categories', QuincaillerieCategoriesController::class)->middleware('auth');
Route::resource('rental', QuincaillerieRentalController::class)->middleware('auth');

Route::get('/manage-testimonies', [App\Http\Controllers\PubController::class, 'manageTestimonies'])->name('manage-testimonies')->middleware('auth');
Route::get('/fetch-testimonies', [App\Http\Controllers\PubController::class, 'fetchTestimonies'])->name('fetch-testimonies')->middleware('auth');
Route::post('/save-testimony', [App\Http\Controllers\PubController::class, 'saveTestimony'])->name('save-testimony')->middleware('auth');
Route::get('/edit-testimony', [App\Http\Controllers\PubController::class, 'editTestimony'])->name('edit-testimony')->middleware('auth');
Route::get('/destroy-testimony', [App\Http\Controllers\PubController::class, 'destroyTestimony'])->name('destroy-testimony')->middleware('auth');
Route::put('/update-testimony', [App\Http\Controllers\PubController::class, 'updateTestimony'])->name('update-testimony')->middleware('auth');

/** FAQS */
Route::resource('faqs', FaqController::class);

/** PRODUCTS */
Route::resource('products', ProductController::class);
// Route::get('/edit-product/{product}', [ProductController::class, 'edit'])->name('edit-product');

/** HEROS */
Route::resource('heros', HerosectionController::class);

/** ACHIEVEMNTS */
Route::resource('refs', \App\Http\Controllers\AchievementController::class);

Route::get('/manage-albums', [App\Http\Controllers\PubController::class, 'manageAlbums'])->name('manage-albums')->middleware('auth');
Route::get('/fetch-albums', [App\Http\Controllers\PubController::class, 'fetchAlbums'])->name('fetch-albums')->middleware('auth');
Route::post('/save-album', [App\Http\Controllers\PubController::class, 'saveAlbum'])->name('save-album')->middleware('auth');
Route::post('/update-album', [App\Http\Controllers\PubController::class, 'updateAlbum'])->name('update-album')->middleware('auth');
Route::get('/show-album', [App\Http\Controllers\PubController::class, 'showAlbum'])->name('show-album')->middleware('auth');
Route::get('/destroy-album', [App\Http\Controllers\PubController::class, 'destroyAlbum'])->name('destroy-album')->middleware('auth');
Route::get('/destroy-image', [App\Http\Controllers\PubController::class, 'destroyImage'])->name('destroy-image')->middleware('auth');


/* EMAIL AND COMMUNICATION */

//Route::get('/mailbox', [App\Http\Controllers\ContactController::class, 'mailbox'])->name('mailbox')->middleware('auth');
//Route::get('/mail-details', [App\Http\Controllers\ContactController::class, 'mailDetails'])->name('mailbox-details')->middleware('auth');

/* EMAIL AND COMMUNICATION */


/* END BACK OFFICE ROUTES */


//////////////////////////////////////////////////////////////////////////////////////////////////////


/* FRONT OFFICE ROUTES */


/* END FRONT OFFICE ROUTES */


Route::post('/store-contact', [App\Http\Controllers\frontoffice\PagesController::class, 'storeContact'])->name('store-contact');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Auth::routes();
Auth::routes(['register' => false]);
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::redirect('/', '/fr');

Route::group(['prefix' => '{language}'], function () {
    Route::get('/', function () {
        $refs = Reference::OrderBy('updated_at', 'DESC')->paginate(10);
        return view('welcome', compact('refs'));
    })->name('homepage');
    Route::get('/contact-us', [App\Http\Controllers\frontoffice\PagesController::class, 'contact'])->name('contact');
    Route::get('/sims-decor', [App\Http\Controllers\frontoffice\PagesController::class, 'simsdecor'])->name('simsdecor');
    Route::get('/sims-quincaillerie', [App\Http\Controllers\frontoffice\PagesController::class, 'quincaillerie'])->name('quincaillerie');
    Route::get('/services/architecture', [App\Http\Controllers\frontoffice\PagesController::class, 'architecture'])->name('architecture');
    Route::get('/services/consulting', [App\Http\Controllers\frontoffice\PagesController::class, 'consulting'])->name('consulting');
    Route::get('/services/construction', [App\Http\Controllers\frontoffice\PagesController::class, 'construction'])->name('construction');
    Route::get('/services/renovation', [App\Http\Controllers\frontoffice\PagesController::class, 'renovation'])->name('renovation');
    Route::get('/about-us', [App\Http\Controllers\frontoffice\PagesController::class, 'about'])->name('about');
    Route::get('/projects', [App\Http\Controllers\frontoffice\PagesController::class, 'projects'])->name('projects');
    Route::get('/read-project', [App\Http\Controllers\frontoffice\PagesController::class, 'readproject'])->name('readproject');

    Route::middleware([
        'auth',
        'verified'
    ])->group(function () {


    });
});

//Route::redirect('/{{ $lang }}/read-project?ref={{$i}}', '//{{ $lang }}/read-project/{{$ref->title_en}}');
