@extends('admin.layouts.app')
@section('title', __('Contact inquiries'))
@section('heading', __('Contact inquiries'))
@section('subheading', __('Messages submitted via the public contact form.'))
@section('content')
<section class="genzis-card admin-panel">
    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Email') }}</th>
                    <th>{{ __('Subject') }}</th>
                    <th>{{ __('Received') }}</th>
                    <th>{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
            @forelse($contactEmails as $inquiry)
                <tr>
                    <td><strong>{{ $inquiry->name }}</strong></td>
                    <td>{{ $inquiry->email }}</td>
                    <td>{{ Str::limit($inquiry->subject, 40) }}</td>
                    <td>{{ $inquiry->created_at?->format('M d, Y H:i') }}</td>
                    <td>
                        <div class="admin-actions-inline">
                            <a class="genzis-btn genzis-btn--ghost genzis-btn--sm"
                               href="{{ route('admin.contact-emails.show', ['language' => app()->getLocale(), 'contact_email' => $inquiry]) }}">
                                {{ __('View') }}
                            </a>
                            <form method="POST"
                                  action="{{ route('admin.contact-emails.destroy', ['language' => app()->getLocale(), 'contact_email' => $inquiry]) }}"
                                  onsubmit="return confirm(@json(__('Delete this inquiry permanently?')))">
                                @csrf
                                @method('DELETE')
                                <button class="genzis-btn genzis-btn--ghost genzis-btn--sm" type="submit">{{ __('Delete') }}</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="admin-muted">{{ __('No contact inquiries yet.') }}</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    {{ $contactEmails->links() }}
</section>
@endsection
