@extends('admin.layouts.app')
@section('title', __('Contact inquiry'))
@section('heading', $contactEmail->subject)
@section('subheading', $contactEmail->created_at?->format('M d, Y H:i'))
@section('actions')
<form method="POST"
      action="{{ route('admin.contact-emails.destroy', ['language' => app()->getLocale(), 'contact_email' => $contactEmail]) }}"
      onsubmit="return confirm(@json(__('Delete this inquiry permanently?')))">
    @csrf
    @method('DELETE')
    <button class="genzis-btn genzis-btn--ghost genzis-btn--sm" type="submit">{{ __('Delete') }}</button>
</form>
@endsection
@section('content')
<section class="genzis-card admin-panel">
    <p><strong>{{ __('Name') }}:</strong> {{ $contactEmail->name }}</p>
    <p><strong>{{ __('Email') }}:</strong> <a href="mailto:{{ $contactEmail->email }}">{{ $contactEmail->email }}</a></p>
    <p><strong>{{ __('Phone') }}:</strong> {{ $contactEmail->phone }}</p>
    <p><strong>{{ __('Subject') }}:</strong> {{ $contactEmail->subject }}</p>
    <hr>
    <p style="white-space: pre-wrap">{{ $contactEmail->message }}</p>
    <p class="admin-muted" style="margin-top:1.5rem">
        <a href="{{ route('admin.contact-emails.index', ['language' => app()->getLocale()]) }}">{{ __('Back to list') }}</a>
    </p>
</section>
@endsection
