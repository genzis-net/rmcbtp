<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuincaillerieImages extends Model
{
    use HasFactory;
    protected $fillable =[
        'quincaillerie_id',
        'src', 
    ];

    public function quicailleries(){
        return $this->BelongsTo(Quincaillerie::Class, 'quincaillerie_id');
    }
}
