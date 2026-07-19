<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Gallery::class, 'gallery');
    }

    public function index()
    {
        $galleries = Gallery::with('images')->latest()->paginate(12);
        return view('admin.galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $gallery = Gallery::create([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => Str::slug($request->name) . '-' . Str::random(4),
            'is_active' => true,
        ]);

        return redirect()
            ->route('admin.galleries.index', ['language' => app()->getLocale()])
            ->with('success', 'Gallery created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        $gallery->load('images');
        return view('admin.galleries.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $gallery->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('admin.galleries.index', ['language' => app()->getLocale()])
            ->with('success', 'Gallery updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->load('images');

        foreach ($gallery->images as $image) {
            if ($image->path) {
                Storage::disk('public')->delete($image->path);
            }
            $image->delete();
        }

        $gallery->delete();

        return redirect()
            ->route('admin.galleries.index', ['language' => app()->getLocale()])
            ->with('success', __('Gallery deleted successfully!'));
    }
}
