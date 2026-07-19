@extends('admin.layouts.app')
@section('title', isset($testimonial) ? 'Edit Testimonial' : 'New Testimonial')
@section('heading', isset($testimonial) ? 'Edit testimonial' : 'New testimonial')
@section('subheading', 'Client quote in English and French')
@php $locale = app()->getLocale(); $item = $testimonial ?? null; @endphp
@section('content')
<section class="genzis-card admin-panel">
    <form class="admin-form" method="POST" action="{{ $item ? route('admin.testimonials.update', ['language'=>$locale,'testimonial'=>$item->id]) : route('admin.testimonials.store', ['language'=>$locale]) }}">
        @csrf
        @if($item) @method('PUT') @endif

        <div class="admin-form__section">
            <div class="admin-form__section-head">
                <h3>Client</h3>
                <p>Name shown with the quote.</p>
            </div>
            <div class="admin-form-grid">
                <div class="genzis-field full">
                    <label for="client">Client name</label>
                    <input id="client" name="client" value="{{ old('client', $item->client ?? '') }}" required>
                </div>
            </div>
        </div>

        <div class="admin-form__section">
            <div class="admin-form__section-head">
                <h3>Quote</h3>
                <p>Keep both languages aligned for the language switcher.</p>
            </div>
            <div class="admin-form-grid">
                <div class="genzis-field full">
                    <label for="content_en">Content (EN)</label>
                    <textarea id="content_en" name="content_en" required>{{ old('content_en', $item->content_en ?? '') }}</textarea>
                </div>
                <div class="genzis-field full">
                    <label for="content_fr">Content (FR)</label>
                    <textarea id="content_fr" name="content_fr" required>{{ old('content_fr', $item->content_fr ?? '') }}</textarea>
                </div>
            </div>
        </div>

        <div class="admin-form__footer">
            <a class="genzis-btn genzis-btn--ghost genzis-btn--sm" href="{{ route('admin.testimonials.index', ['language'=>$locale]) }}">Cancel</a>
            <button class="genzis-btn genzis-btn--primary genzis-btn--sm" type="submit">Save testimonial</button>
        </div>
    </form>
</section>
@endsection
