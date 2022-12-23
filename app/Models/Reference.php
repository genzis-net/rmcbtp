<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title_fr',
        'title_en',
        'year',
        'client',
        'content_fr',
        'content_en',
        'location',
        'client',
        'project_type',
        'user_id',
    ];

    public function users(){
        return $this->belongsTo(User::Class, 'user_id');
    }

    public function images(){
        return $this->hasMany('App\Models\Image');
    }
}
