<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name_en',
        'name_fr',
        'src',
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function localizedName(?string $locale = null): string
    {
        $locale = $locale ?: app()->getLocale();

        return $locale === 'fr'
            ? ($this->name_fr ?: $this->name_en)
            : ($this->name_en ?: $this->name_fr);
    }
}
