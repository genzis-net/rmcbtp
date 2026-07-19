<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'cats';

    protected $fillable = [
        'catalog',
        'name_en',
        'name_fr',
        'description_en',
        'description_fr',
    ];

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class, 'cat_id');
    }

    /** @deprecated Use subcategories() */
    public function subcats()
    {
        return $this->subcategories();
    }

    public function scopeCatalog($query, string $catalog)
    {
        return $query->where('catalog', $catalog);
    }

    public function localizedName(?string $locale = null): string
    {
        $locale = $locale ?: app()->getLocale();

        return $locale === 'fr'
            ? ($this->name_fr ?: $this->name_en)
            : ($this->name_en ?: $this->name_fr);
    }
}
