<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'slug',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the images for the gallery.
     */
    public function images()
    {
        return $this->hasMany(GalleryImage::class);
    }

    /**
     * Get active galleries.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
