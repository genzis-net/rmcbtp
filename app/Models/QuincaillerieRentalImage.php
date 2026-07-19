<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuincaillerieRentalImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'quincaillerieRental_id',
        'src',
    ];

    public function rental()
    {
        return $this->belongsTo(QuincaillerieRental::class, 'quincaillerieRental_id');
    }
}
