<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcat extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name_en',
        'name_fr',
        'cat_id',
        'deleted_at',
    ];

    public function cats(){
        return $this->belongsTo(Cat::Class, 'cat_id');
    }

    public function products(){
        return $this->hasMany(Product::Class);
    }
}
