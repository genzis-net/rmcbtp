<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'reference_id',
        'src',
    ];

    public function references(){
        return $this->BelongsTo(Reference::Class, 'reference_id');
    }
}
