<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchitectureImages extends Model
{
    use HasFactory;

    protected $fillable = [
        'src',
        'architecture_id',
    ];

    public function architecture()
    {
        return $this->belongsTo(Architecture::class, 'architecture_id');
    }
}
