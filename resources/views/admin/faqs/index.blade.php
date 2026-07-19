@extends('admin.layouts.app')
@section('title', 'FAQs')
@section('heading', 'FAQs')
@section('subheading', 'Common questions')
@section('actions')
<a class="genzis-btn genzis-btn--primary genzis-btn--sm" href="{{ route('admin.faqs.create', ['language'=>app()->getLocale()]) }}">New FAQ</a>
@endsection
@section('content')
<section class="genzis-card admin-panel">
    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead><tr><th>Question</th><th>Updated</th><th>Actions</th></tr></thead>
            <tbody>
            @forelse($faqs as $faq)
                <tr>
                    <td>
                        <strong>{{ $faq->question['en'] ?? reset($faq->question ?? []) }}</strong>
                        <div class="admin-muted">{{ Str::limit($faq->answer['en'] ?? '', 80) }}</div>
                    </td>
                    <td>{{ $faq->updated_at?->format('M d, Y') }}</td>
                    <td>
                        <div class="admin-actions-inline">
                            <a class="genzis-btn genzis-btn--ghost genzis-btn--sm" href="{{ route('admin.faqs.edit', ['language'=>app()->getLocale(),'faq'=>$faq]) }}">Edit</a>
                            <form method="POST" action="{{ route('admin.faqs.destroy', ['language'=>app()->getLocale(),'faq'=>$faq]) }}" onsubmit="return confirm('Delete?')">
                                @csrf @method('DELETE')
                                <button class="genzis-btn genzis-btn--ghost genzis-btn--sm" type="submit">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3" class="admin-muted">No FAQs yet.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    {{ $faqs->links() }}
</section>
@endsection
