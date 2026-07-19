<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{
    public function upload(Request $request, Product $product)
    {
        $request->validate([
            'images' => 'required|array|max:12',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:4096',
        ]);

        foreach ((array) $request->file('images', []) as $file) {
            $src = $file->store('products/' . $product->id, 'public');
            $product->images()->create(['src' => $src]);
        }

        return redirect()
            ->route('admin.products.show', ['language' => app()->getLocale(), 'product' => $product])
            ->with('success', 'Product images uploaded successfully.');
    }

    public function destroy(ProductImage $image)
    {
        // Explicit delete of a single image: remove the file as well.
        if ($image->src) {
            Storage::disk('public')->delete($image->src);
        }

        $image->forceDelete();

        return redirect()
            ->back()
            ->with('success', 'Image deleted successfully.');
    }
}
