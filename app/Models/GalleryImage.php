<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryImage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'gallery_id',
        'title',
        'description',
        'path',
        'alt_text',
        'order',
    ];

    protected $casts = [
        'order' => 'integer',
    ];

    /**
     * Get the gallery that owns the image.
     */
    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

    /**
     * Scope for ordering images.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}
