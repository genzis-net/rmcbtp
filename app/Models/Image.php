<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'album_id',
        'src',
    ];

    public function albums(){
        return $this->BelongsTo(Album::Class, 'album_id');
    }
}
