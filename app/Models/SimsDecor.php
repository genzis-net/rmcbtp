<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SimsDecor extends Model
{
    use HasFactory, HasTranslations;
    protected $fillable = [
        'title',
        'description'
    ];

    public $translatable = [
        'title',
        'description'
    ];

    public function simsDecorImages(){
        return $this->HasMany(SimsDecorImages::Class);
    }
}
