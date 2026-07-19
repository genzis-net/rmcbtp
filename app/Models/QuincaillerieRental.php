<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class QuincaillerieRental extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'name',
        'description',
        'price',
    ];

    public $translatable = [
        'name',
        'description',
    ];

    public function images()
    {
        return $this->hasMany(QuincaillerieRentalImage::class, 'quincaillerieRental_id');
    }
}
