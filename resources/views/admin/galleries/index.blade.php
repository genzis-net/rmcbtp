@extends('admin.layouts.app')
@section('title', 'Galleries')
@section('heading', 'Galleries')
@section('subheading', 'Photo collections')
@section('actions')
<a class="genzis-btn genzis-btn--primary genzis-btn--sm" href="{{ route('admin.galleries.create', ['language' => app()->getLocale()]) }}">New gallery</a>
@endsection
@section('content')
<section class="genzis-card admin-panel">
    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead><tr><th>Name</th><th>Images</th><th>Status</th><th>Actions</th></tr></thead>
            <tbody>
            @forelse($galleries as $gallery)
                <tr>
                    <td>
                        <strong>{{ $gallery->name }}</strong>
                        <div class="admin-muted">{{ Str::limit($gallery->description, 80) }}</div>
                    </td>
                    <td>{{ $gallery->images->count() }}</td>
                    <td>{{ $gallery->is_active ? 'Active' : 'Hidden' }}</td>
                    <td>
                        <div class="admin-actions-inline">
                            <a class="genzis-btn genzis-btn--ghost genzis-btn--sm" href="{{ route('admin.galleries.show', ['language'=>app()->getLocale(),'gallery'=>$gallery]) }}">Manage</a>
                            <a class="genzis-btn genzis-btn--ghost genzis-btn--sm" href="{{ route('admin.galleries.edit', ['language'=>app()->getLocale(),'gallery'=>$gallery]) }}">Edit</a>
                            <form method="POST" action="{{ route('admin.galleries.destroy', ['language'=>app()->getLocale(),'gallery'=>$gallery]) }}" onsubmit="return confirm('Delete?')">
                                @csrf @method('DELETE')
                                <button class="genzis-btn genzis-btn--ghost genzis-btn--sm" type="submit">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="admin-muted">No galleries yet.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div style="margin-top:16px">{{ $galleries->links() }}</div>
</section>
@endsection
