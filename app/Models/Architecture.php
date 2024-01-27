<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class Architecture extends Model
{
    use HasFactory, HasTranslations;
    protected $fillable =[
        'title',
        'description', 
        'price' 
    ];

    public $translatable = [
        'title',
        'description'
    ];

    public function architectureImages(){
        return $this->HasMany(ArchitectureImages::Class);
    }
}
