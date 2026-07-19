<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Reference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Reference::class, 'project');
    }

    public function index()
    {
        $projects = Reference::with('images')->latest()->paginate(12);

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['user_id'] = auth()->id();

        $project = Reference::create($data);

        if ($request->hasFile('images')) {
            foreach ((array) $request->file('images') as $file) {
                $src = $file->store('projects/' . $project->id, 'public');
                $project->images()->create(['src' => $src]);
            }
        }

        return redirect()
            ->route('admin.projects.index', ['language' => app()->getLocale()])
            ->with('success', __('Project created successfully.'));
    }

    public function show(Reference $project)
    {
        $project->load('images');

        return view('admin.projects.show', compact('project'));
    }

    public function edit(Reference $project)
    {
        $project->load('images');

        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Reference $project)
    {
        $project->update($this->validated($request));

        if ($request->hasFile('images')) {
            foreach ((array) $request->file('images') as $file) {
                $src = $file->store('projects/' . $project->id, 'public');
                $project->images()->create(['src' => $src]);
            }
        }

        return redirect()
            ->route('admin.projects.index', ['language' => app()->getLocale()])
            ->with('success', 'Project updated successfully.');
    }

    public function destroy(Reference $project)
    {
        foreach ($project->images as $image) {
            if ($image->src) {
                Storage::disk('public')->delete($image->src);
            }
            $image->delete();
        }

        $project->delete();

        return redirect()
            ->route('admin.projects.index', ['language' => app()->getLocale()])
            ->with('success', 'Project deleted successfully.');
    }

    public function destroyImage(Reference $project, Image $image)
    {
        abort_unless($image->reference_id === $project->id, 404);

        if ($image->src) {
            Storage::disk('public')->delete($image->src);
        }
        $image->delete();

        return back()->with('success', 'Image removed.');
    }

    protected function validated(Request $request): array
    {
        return $request->validate([
            'title_en' => 'required|string|max:255',
            'title_fr' => 'required|string|max:255',
            'client' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'location' => 'required|string|max:255',
            'project_type' => 'required|string|max:255',
            'content_en' => 'required|string',
            'content_fr' => 'required|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:4096',
        ]);
    }
}
