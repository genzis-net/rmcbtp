<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use HasFactory, HasSlug, SoftDeletes;

    public const CATALOG_QUINCAILLERIE = 'quincaillerie';
    public const CATALOG_SIMS_DECOR = 'sims_decor';

    public const CATALOGS = [
        self::CATALOG_QUINCAILLERIE => 'SIMS Quincaillerie',
        self::CATALOG_SIMS_DECOR => 'SIMS Decor',
    ];

    protected $fillable = [
        'name',
        'name_en',
        'name_fr',
        'slug',
        'catalog',
        'is_featured',
        'is_active',
        'subcat_id',
        'material_id',
        'id_number',
        'weight',
        'quantity',
        'mesure_h',
        'mesure_w',
        'mesure_e',
        'diameter',
        'price',
        'uniq_id',
        'description_en',
        'description_fr',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'price' => 'float',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(fn () => $this->name_en ?: $this->name_fr ?: $this->name)
            ->saveSlugsTo('slug')
            ->extraScope(fn ($builder) => $builder->where('catalog', $this->catalog));
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcat_id');
    }

    /** @deprecated Use subcategory() */
    public function subcats()
    {
        return $this->subcategory();
    }

    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id');
    }

    /** @deprecated Use material() */
    public function materials()
    {
        return $this->material();
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id')->orderBy('id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeCatalog($query, string $catalog)
    {
        return $query->where('catalog', $catalog);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeSearch($query, ?string $term)
    {
        if (! filled($term)) {
            return $query;
        }

        $like = '%' . str_replace(['%', '_'], ['\\%', '\\_'], $term) . '%';

        return $query->where(function ($q) use ($like) {
            $q->where('name', 'like', $like)
                ->orWhere('name_en', 'like', $like)
                ->orWhere('name_fr', 'like', $like)
                ->orWhere('description_en', 'like', $like)
                ->orWhere('description_fr', 'like', $like)
                ->orWhere('uniq_id', 'like', $like)
                ->orWhere('id_number', 'like', $like);
        });
    }

    public function catalogLabel(): string
    {
        return self::CATALOGS[$this->catalog] ?? $this->catalog;
    }

    public function catalogSlug(): string
    {
        return $this->catalog === self::CATALOG_SIMS_DECOR ? 'sims-decor' : 'quincaillerie';
    }

    public function localizedName(?string $locale = null): string
    {
        $locale = $locale ?: app()->getLocale();

        if ($locale === 'fr') {
            return $this->name_fr ?: $this->name_en ?: (string) $this->name;
        }

        return $this->name_en ?: $this->name_fr ?: (string) $this->name;
    }

    public function localizedDescription(?string $locale = null): ?string
    {
        $locale = $locale ?: app()->getLocale();

        return $locale === 'fr'
            ? ($this->description_fr ?: $this->description_en)
            : ($this->description_en ?: $this->description_fr);
    }

    public function formattedPrice(): string
    {
        return number_format((float) $this->price, 0, ',', ' ') . ' XAF';
    }

    public function imageUrl(): string
    {
        $src = $this->relationLoaded('images')
            ? $this->images->first()?->src
            : $this->images()->first()?->src;

        if (! $src) {
            return asset('assets/images/logo.png');
        }

        if (Str::startsWith($src, ['http://', 'https://', '//'])) {
            return $src;
        }

        if (Str::startsWith($src, '/')) {
            return $src;
        }

        if (Storage::disk('public')->exists($src)) {
            return asset('storage/' . $src);
        }

        return asset($src);
    }

    public function galleryUrls(): array
    {
        return $this->images
            ->map(fn ($image) => $image->url())
            ->filter()
            ->values()
            ->all();
    }
}
