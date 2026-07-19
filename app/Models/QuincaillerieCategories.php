<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class QuincaillerieCategories extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['category_name'];

    public $translatable = ['category_name'];

    public function quincailleries()
    {
        return $this->hasMany(Quincaillerie::class);
    }
}
