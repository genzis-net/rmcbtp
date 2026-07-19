<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(10);

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'client' => 'required|string|max:255',
            'content_en' => 'required|string',
            'content_fr' => 'required|string',
        ]);

        Testimonial::create($data);

        return redirect()->route('admin.testimonials.index', ['language' => app()->getLocale()])
            ->with('success', __('Testimonial created successfully.'));
    }

    public function show(Testimonial $testimonial)
    {
        return view('admin.testimonials.show', compact('testimonial'));
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $request->validate([
            'client' => 'required|string|max:255',
            'content_en' => 'required|string',
            'content_fr' => 'required|string',
        ]);

        $testimonial->update($data);

        return redirect()->route('admin.testimonials.index', ['language' => app()->getLocale()])
            ->with('success', __('Testimonial updated successfully.'));
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index', ['language' => app()->getLocale()])
            ->with('success', __('Testimonial deleted successfully.'));
    }
}
