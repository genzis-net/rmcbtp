<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reference extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title_fr',
        'title_en',
        'year',
        'client',
        'content_fr',
        'content_en',
        'location',
        'project_type',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
