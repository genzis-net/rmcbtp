<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuincaillerieRentalImage extends Model
{
    use HasFactory;
    protected $fillable =[
        'quincaillerieRental_id',
        'src', 
    ];

    public function quicailleries(){
        return $this->BelongsTo(Quincaillerie::Class, 'quincaillerieRental_id');
    }
}
