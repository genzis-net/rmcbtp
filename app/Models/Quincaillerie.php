<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class Quincaillerie extends Model
{
    use HasFactory, HasTranslations;
    protected $fillable =[
        'name',
        'description', 
        'price', 
        'quincaillerieCategories_id' 
    ];

    public $translatable = [
        'name',
        'description'
    ];

    public function quicaillerieImages(){
        return $this->HasMany(QuincaillerieImages::Class);
    }

    public function quicaillerieCategories(){
        return $this->BelongsTo(QuincaillerieCategories::Class, 'quincaillerieCategories_id');
    }

}
