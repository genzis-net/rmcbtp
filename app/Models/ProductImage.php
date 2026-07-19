<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class ProductImage extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'prod_images';

    protected $fillable = [
        'product_id',
        'src',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function url(): string
    {
        $src = $this->src;

        if (!$src) {
            return asset('assets/images/logo.png');
        }

        if (Str::startsWith($src, ['http://', 'https://', '//'])) {
            return $src;
        }

        if (Str::startsWith($src, '/')) {
            return $src;
        }

        return asset('storage/' . ltrim($src, '/'));
    }
}
