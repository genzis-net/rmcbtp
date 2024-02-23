<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'title_fr',
        'title_en',
        'content_fr',
        'content_en',
        'cover',
        'document',
        'status',
        'user_id',
        'deleted_at',
    ];

    public function users(){
        return $this->belongsTo(User::Class, 'user_id');
    }
}
