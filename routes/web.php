<?php

use App\Models\Reference;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/under-construction', function () {
    return view('pages.underconstruction');
})->name('underconstruction');

Route::get('/', function () {
    $locale = session('locale', \App\Helpers\LanguageHelper::getBrowserLanguage());
    if (!in_array($locale, ['en', 'fr'], true)) {
        $locale = 'en';
    }

    return redirect("/{$locale}");
})->name('root');

Route::get('/switch-language/{language}', function ($language) {
    if (!in_array($language, ['en', 'fr'], true)) {
        return redirect()->back();
    }

    session(['locale' => $language]);

    $path = parse_url(request()->headers->get('referer', '/'), PHP_URL_PATH) ?: '/';
    $segments = explode('/', trim($path, '/'));

    if ($segments && in_array($segments[0], ['en', 'fr'], true)) {
        $segments[0] = $language;
    } else {
        array_unshift($segments, $language);
    }

    $newPath = '/' . implode('/', array_filter($segments, fn ($s) => $s !== ''));

    return redirect($newPath);
})->name('switch.language');

Route::post('/store-contact', [App\Http\Controllers\Frontoffice\PagesController::class, 'storeContact'])
    ->middleware('throttle:5,1')
    ->name('store-contact');

Route::group(['prefix' => '{language}', 'middleware' => 'localization'], function () {
    Route::get('/', function () {
        $refs = Reference::with('images')->orderByDesc('updated_at')->paginate(10);

        return view('welcome', compact('refs'));
    })->name('homepage');

    Auth::routes(['register' => false, 'verify' => true]);

    Route::get('/contact-us', [App\Http\Controllers\Frontoffice\PagesController::class, 'contact'])->name('contact');
    Route::get('/sims-decor', [App\Http\Controllers\Frontoffice\PagesController::class, 'simsdecor'])->name('simsdecor');
    Route::get('/sims-quincaillerie', [App\Http\Controllers\Frontoffice\PagesController::class, 'quincaillerie'])->name('quincaillerie');
    Route::get('/catalog/{catalog}', [App\Http\Controllers\Frontoffice\CatalogController::class, 'index'])
        ->where('catalog', 'quincaillerie|sims-decor')
        ->name('catalog.index');
    Route::get('/catalog/{catalog}/{product}', [App\Http\Controllers\Frontoffice\CatalogController::class, 'show'])
        ->where('catalog', 'quincaillerie|sims-decor')
        ->name('catalog.show');
    Route::get('/services/architecture', [App\Http\Controllers\Frontoffice\PagesController::class, 'architecture'])->name('architecture');
    Route::get('/services/consulting', [App\Http\Controllers\Frontoffice\PagesController::class, 'consulting'])->name('consulting');
    Route::get('/services/construction', [App\Http\Controllers\Frontoffice\PagesController::class, 'construction'])->name('construction');
    Route::get('/services/renovation', [App\Http\Controllers\Frontoffice\PagesController::class, 'renovation'])->name('renovation');
    Route::get('/about-us', [App\Http\Controllers\Frontoffice\PagesController::class, 'about'])->name('about');
    Route::get('/privacy', [App\Http\Controllers\Frontoffice\PagesController::class, 'privacy'])->name('privacy');
    Route::get('/projects', [App\Http\Controllers\Frontoffice\PagesController::class, 'projects'])->name('projects.index');
    Route::get('/projects/{project}', [App\Http\Controllers\Frontoffice\PagesController::class, 'readproject'])->name('readproject');
    Route::get('/newsletter', [App\Http\Controllers\Frontoffice\PagesController::class, 'newsletter'])->name('newsletter');
    Route::get('/view-campaign', [App\Http\Controllers\Frontoffice\PagesController::class, 'viewCampaign'])->name('view-campaign');

    Route::prefix('admin')->middleware(['auth', 'verified', 'admin'])->name('admin.')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

        Route::resource('blog-posts', \App\Http\Controllers\Admin\BlogPostController::class);
        Route::post('/blog-posts/{blog_post}/publish', [\App\Http\Controllers\Admin\BlogPostController::class, 'publish'])->name('blog-posts.publish');
        Route::post('/blog-posts/{blog_post}/unpublish', [\App\Http\Controllers\Admin\BlogPostController::class, 'unpublish'])->name('blog-posts.unpublish');

        Route::resource('testimonials', \App\Http\Controllers\Admin\TestimonialController::class);

        Route::resource('galleries', \App\Http\Controllers\Admin\GalleryController::class);
        Route::resource('galleries.images', \App\Http\Controllers\Admin\GalleryImageController::class);
        Route::post('/galleries/{gallery}/images/upload', [\App\Http\Controllers\Admin\GalleryImageController::class, 'upload'])->name('galleries.images.upload');

        Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
        Route::resource('product-categories', \App\Http\Controllers\Admin\ProductCategoryController::class)->except(['show']);
        Route::post('/products/{product}/images/upload', [\App\Http\Controllers\Admin\ProductImageController::class, 'upload'])->name('products.images.upload');
        Route::delete('/products/images/{image}', [\App\Http\Controllers\Admin\ProductImageController::class, 'destroy'])->name('products.images.destroy');

        Route::resource('projects', \App\Http\Controllers\Admin\ProjectController::class);
        Route::delete('/projects/{project}/images/{image}', [\App\Http\Controllers\Admin\ProjectController::class, 'destroyImage'])->name('projects.images.destroy');

        Route::resource('faqs', \App\Http\Controllers\Admin\FaqController::class);

        Route::resource('contact-emails', \App\Http\Controllers\Admin\ContactEmailController::class)
            ->only(['index', 'show', 'destroy']);

        Route::get('/settings', [\App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings');
        Route::post('/settings', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');
    });
});
