<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Reference;
use App\Policies\ArticlePolicy;
use App\Policies\GalleryPolicy;
use App\Policies\ProductPolicy;
use App\Policies\ProjectPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Article::class => ArticlePolicy::class,
        Product::class => ProductPolicy::class,
        Gallery::class => GalleryPolicy::class,
        Reference::class => ProjectPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('admin', fn ($user) => $user->isAdmin());
    }
}
