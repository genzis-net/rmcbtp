<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use HasFactory, HasSlug;

    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
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
        'short_description_en',
        'short_description_fr',
        'description_fr',
        'deleted_at',
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function subcats(){
        return $this->belongsTo(Subcat::Class, 'subcat_id');
    }

    public function materials(){
        return $this->belongsTo(Material::Class, 'material_id');
    }
    public function images(){
        return $this->hasMany(ProdImage::Class, 'product_id');
    }

    public function getRouteKeyName(){
        return 'slug';
    }
}
