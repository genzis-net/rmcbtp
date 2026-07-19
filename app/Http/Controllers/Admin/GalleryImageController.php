<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UploadGalleryImagesRequest;
use App\Models\Gallery;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryImageController extends Controller
{
    public function index(Gallery $gallery)
    {
        return redirect()->route('admin.galleries.show', [
            'language' => app()->getLocale(),
            'gallery' => $gallery,
        ]);
    }

    public function create(Gallery $gallery)
    {
        return redirect()->route('admin.galleries.show', [
            'language' => app()->getLocale(),
            'gallery' => $gallery,
        ]);
    }

    public function store(Request $request, Gallery $gallery)
    {
        return $this->upload($request, $gallery);
    }

    public function upload(UploadGalleryImagesRequest $request, Gallery $gallery)
    {
        $order = (int) $gallery->images()->max('order');

        foreach ((array) $request->file('images', []) as $file) {
            $path = $file->store('galleries/' . $gallery->id, 'public');
            $order++;

            $gallery->images()->create([
                'title' => $request->title ?: pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME),
                'description' => null,
                'path' => $path,
                'alt_text' => $request->alt_text,
                'order' => $order,
            ]);
        }

        return redirect()
            ->route('admin.galleries.show', ['language' => app()->getLocale(), 'gallery' => $gallery])
            ->with('success', __('Images uploaded successfully.'));
    }

    public function show(Gallery $gallery, GalleryImage $image)
    {
        return redirect()->route('admin.galleries.show', [
            'language' => app()->getLocale(),
            'gallery' => $gallery,
        ]);
    }

    public function edit(Gallery $gallery, GalleryImage $image)
    {
        abort_unless($image->gallery_id === $gallery->id, 404);

        return view('admin.galleries.images-edit', compact('gallery', 'image'));
    }

    public function update(Request $request, Gallery $gallery, GalleryImage $image)
    {
        abort_unless($image->gallery_id === $gallery->id, 404);

        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'alt_text' => 'nullable|string|max:255',
            'order' => 'nullable|integer|min:0',
        ]);

        $image->update($data);

        return redirect()
            ->route('admin.galleries.show', ['language' => app()->getLocale(), 'gallery' => $gallery])
            ->with('success', 'Image updated successfully.');
    }

    public function destroy(Gallery $gallery, GalleryImage $image)
    {
        abort_unless($image->gallery_id === $gallery->id, 404);

        if ($image->path) {
            Storage::disk('public')->delete($image->path);
        }

        $image->delete();

        return redirect()
            ->route('admin.galleries.show', ['language' => app()->getLocale(), 'gallery' => $gallery])
            ->with('success', 'Image deleted successfully.');
    }
}
