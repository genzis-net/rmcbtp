<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faq extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'question',
        'answer',
        'added_by',
    ];

    protected $casts = [
        'question' => 'array',
        'answer' => 'array',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'added_by');
    }
}
