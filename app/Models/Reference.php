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
        'date',
        'client',
        'content_fr',
        'content_en',
        'cover',
        'user_id',
    ];

    public function users(){
        return $this->belongsTo(User::Class, 'user_id');
    }
}
