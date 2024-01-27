<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class QuincaillerieCategories extends Model
{
    use HasFactory, HasTransalations;
    protected $fillable = ['category_name'];
    public $translatable = ['category_name'];
    public function quicailleries(){
        return $this->HasMany(Quincaillerie::Class);
    }
}
