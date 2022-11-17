<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/under-construction', function () {
    return view('pages.underconstruction');
})->name('underconstruction');

/* BACK OFFICE ROUTES */



        /* PUBLICATIONS CONTROLLER ROUTES */

                Route::get('/manage-albums', [App\Http\Controllers\Dashboard\PublicationController::class, 'manageAlbums'])->name('manage-albums')->middleware('auth');
                Route::get('/fetch-albums', [App\Http\Controllers\Dashboard\PublicationController::class, 'fetchAlbums'])->name('fetch-albums')->middleware('auth');
                Route::post('/save-album', [App\Http\Controllers\Dashboard\PublicationController::class, 'saveAlbum'])->name('save-album')->middleware('auth');
                Route::post('/update-album', [App\Http\Controllers\Dashboard\PublicationController::class, 'updateAlbum'])->name('update-album')->middleware('auth');
                Route::get('/show-album', [App\Http\Controllers\Dashboard\PublicationController::class, 'showAlbum'])->name('show-album')->middleware('auth');
                Route::get('/destroy-album', [App\Http\Controllers\Dashboard\PublicationController::class, 'destroyAlbum'])->name('destroy-album')->middleware('auth');
                Route::get('/destroy-image', [App\Http\Controllers\Dashboard\PublicationController::class, 'destroyImage'])->name('destroy-image')->middleware('auth');

                Route::get('/manage-ref', [App\Http\Controllers\Dashboard\PublicationController::class, 'manageRefs'])->name('manage-refs')->middleware('auth');
                Route::get('/fetch-ref', [App\Http\Controllers\Dashboard\PublicationController::class, 'fetchRefs'])->name('fetch-refs')->middleware('auth');
                Route::post('/save-ref', [App\Http\Controllers\Dashboard\PublicationController::class, 'saveRef'])->name('save-ref')->middleware('auth');
                Route::post('/update-ref', [App\Http\Controllers\Dashboard\PublicationController::class, 'updateRef'])->name('update-ref')->middleware('auth');
                Route::get('/show-ref', [App\Http\Controllers\Dashboard\PublicationController::class, 'showRef'])->name('show-ref')->middleware('auth');
                Route::get('/destroy-ref', [App\Http\Controllers\Dashboard\PublicationController::class, 'destroyRef'])->name('delete-ref')->middleware('auth');
                Route::get('/edit-ref', [App\Http\Controllers\Dashboard\PublicationController::class, 'editRef'])->name('edit-ref')->middleware('auth');


        /* END PUBLICATIONS CONTROLLER ROUTES */

        /* EMAIL AND COMMUNICATION */
        
            Route::get('/mailbox', [App\Http\Controllers\ContactController::class, 'mailbox'])->name('mailbox')->middleware('auth');
            Route::get('/mail-details', [App\Http\Controllers\ContactController::class, 'mailDetails'])->name('mailbox-details')->middleware('auth');

        /* EMAIL AND COMMUNICATION */


/* END BACK OFFICE ROUTES */


//////////////////////////////////////////////////////////////////////////////////////////////////////


/* FRONT OFFICE ROUTES */


/* END FRONT OFFICE ROUTES */






//Auth::routes();
Auth::routes(['register' => false]);
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

