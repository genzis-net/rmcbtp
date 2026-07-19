@extends('admin.layouts.app')
@section('title', 'Projects')
@section('heading', 'Projects')
@section('subheading', 'Portfolio references shown on the public site')
@section('actions')
<a class="genzis-btn genzis-btn--primary genzis-btn--sm" href="{{ route('admin.projects.create', ['language'=>app()->getLocale()]) }}">New project</a>
@endsection
@section('content')
<section class="genzis-card admin-panel">
    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead><tr><th>Title</th><th>Client</th><th>Year</th><th>Images</th><th>Actions</th></tr></thead>
            <tbody>
            @forelse($projects as $project)
                <tr>
                    <td>
                        <strong>{{ $project->title_en }}</strong>
                        <div class="admin-muted">{{ $project->project_type }} · {{ $project->location }}</div>
                    </td>
                    <td>{{ $project->client }}</td>
                    <td>{{ $project->year }}</td>
                    <td>{{ $project->images->count() }}</td>
                    <td>
                        <div class="admin-actions-inline">
                            <a class="genzis-btn genzis-btn--ghost genzis-btn--sm" href="{{ route('admin.projects.show', ['language'=>app()->getLocale(),'project'=>$project]) }}">View</a>
                            <a class="genzis-btn genzis-btn--ghost genzis-btn--sm" href="{{ route('admin.projects.edit', ['language'=>app()->getLocale(),'project'=>$project]) }}">Edit</a>
                            <form method="POST" action="{{ route('admin.projects.destroy', ['language'=>app()->getLocale(),'project'=>$project]) }}" onsubmit="return confirm('Delete?')">
                                @csrf @method('DELETE')
                                <button class="genzis-btn genzis-btn--ghost genzis-btn--sm" type="submit">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="admin-muted">No projects yet.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div style="margin-top:16px">{{ $projects->links() }}</div>
</section>
@endsection
