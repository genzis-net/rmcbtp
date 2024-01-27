<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimsDecorImages extends Model
{
    use HasFactory;

    protected $fillable=[
        'src', 
        'simsDecor_id',
    ];

    public function simsDecors(){
        return $this->BelongsTo(SimsDecor::Class, 'simsDecor_id');
    }
}
