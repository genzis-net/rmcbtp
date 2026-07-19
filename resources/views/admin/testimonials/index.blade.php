@extends('admin.layouts.app')
@section('title', 'Testimonials')
@section('heading', 'Testimonials')
@section('subheading', 'Client voices')
@section('actions')
<a class="genzis-btn genzis-btn--primary genzis-btn--sm" href="{{ route('admin.testimonials.create', ['language' => app()->getLocale()]) }}">New testimonial</a>
@endsection
@section('content')
<section class="genzis-card admin-panel">
    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead><tr><th>Client</th><th>Preview</th><th>Created</th><th>Actions</th></tr></thead>
            <tbody>
            @forelse($testimonials as $item)
                <tr>
                    <td><strong>{{ $item->client }}</strong></td>
                    <td class="admin-muted">{{ Str::limit($item->content_en ?: $item->content_fr, 80) }}</td>
                    <td>{{ $item->created_at?->format('M d, Y') }}</td>
                    <td>
                        <div class="admin-actions-inline">
                            <a class="genzis-btn genzis-btn--ghost genzis-btn--sm" href="{{ route('admin.testimonials.edit', ['language' => app()->getLocale(), 'testimonial' => $item->id]) }}">Edit</a>
                            <form method="POST" action="{{ route('admin.testimonials.destroy', ['language' => app()->getLocale(), 'testimonial' => $item->id]) }}" onsubmit="return confirm('Delete?')">
                                @csrf @method('DELETE')
                                <button class="genzis-btn genzis-btn--ghost genzis-btn--sm" type="submit">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="admin-muted">No testimonials yet.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div style="margin-top:16px">{{ $testimonials->links() }}</div>
</section>
@endsection
