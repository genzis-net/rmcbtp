<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'subcats';

    protected $fillable = [
        'name_en',
        'name_fr',
        'cat_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }

    /** @deprecated Use category() */
    public function cats()
    {
        return $this->category();
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'subcat_id');
    }

    public function localizedName(?string $locale = null): string
    {
        $locale = $locale ?: app()->getLocale();

        return $locale === 'fr'
            ? ($this->name_fr ?: $this->name_en)
            : ($this->name_en ?: $this->name_fr);
    }
}
