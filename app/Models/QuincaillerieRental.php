<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class QuincaillerieRental extends Model
{
    use HasFactory, HasTranslations;
    protected $fillable =[
        'name',
        'description', 
        'price', 
    ];

    public $translatable = [
        'name',
        'description'
    ];

    public function quicaillerieRentalImages(){
        return $this->HasMany(QuicaillerieRentalImage::Class);
    }
}
