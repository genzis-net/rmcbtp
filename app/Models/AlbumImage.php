<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AlbumImage extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'album_id',
        'src',
    ];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
