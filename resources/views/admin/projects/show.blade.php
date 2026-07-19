@extends('admin.layouts.app')
@section('title', $project->title_en)
@section('heading', $project->title_en)
@section('subheading', $project->client.' · '.$project->year)
@section('actions')
<a class="genzis-btn genzis-btn--ghost genzis-btn--sm" href="{{ route('admin.projects.edit', ['language'=>app()->getLocale(),'project'=>$project]) }}">Edit</a>
@endsection
@section('content')
<section class="genzis-card admin-panel" style="margin-bottom:16px">
    <p>{{ $project->content_en }}</p>
    <p class="admin-muted">{{ $project->location }} · {{ $project->project_type }}</p>
</section>
<section class="genzis-card admin-panel">
    <h2 class="admin-panel__title" style="margin-bottom:16px">Images</h2>
    @if($project->images->count())
        <div class="admin-media-grid">
            @foreach($project->images as $image)
                <div class="admin-media-card">
                    <img src="{{ asset('storage/'.$image->src) }}" alt="">
                    <form method="POST" action="{{ route('admin.projects.images.destroy', ['language'=>app()->getLocale(),'project'=>$project,'image'=>$image]) }}" onsubmit="return confirm('Delete?')">
                        @csrf @method('DELETE')
                        <button class="genzis-btn genzis-btn--primary genzis-btn--sm" type="submit">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    @else
        <p class="admin-muted">No images yet. Edit the project to upload.</p>
    @endif
</section>
@endsection
