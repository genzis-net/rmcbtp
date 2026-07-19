@extends('admin.layouts.app')
@section('title', isset($gallery) && request()->routeIs('*.edit') ? 'Edit Gallery' : 'New Gallery')
@section('heading', isset($gallery) && request()->routeIs('*.edit') ? 'Edit gallery' : 'New gallery')
@section('subheading', 'Named album for photo collections')
@php $locale = app()->getLocale(); $item = request()->routeIs('*.edit') ? ($gallery ?? null) : null; @endphp
@section('content')
<section class="genzis-card admin-panel">
    <form class="admin-form" method="POST" action="{{ $item ? route('admin.galleries.update', ['language'=>$locale,'gallery'=>$item]) : route('admin.galleries.store', ['language'=>$locale]) }}">
        @csrf
        @if($item) @method('PUT') @endif

        <div class="admin-form__section">
            <div class="admin-form__section-head">
                <h3>Gallery details</h3>
                <p>Name and short description for this album.</p>
            </div>
            <div class="admin-form-grid">
                <div class="genzis-field full">
                    <label for="name">Name</label>
                    <input id="name" name="name" value="{{ old('name', $item->name ?? '') }}" required>
                </div>
                <div class="genzis-field full">
                    <label for="description">Description</label>
                    <textarea id="description" name="description">{{ old('description', $item->description ?? '') }}</textarea>
                </div>
            </div>
        </div>

        <div class="admin-form__footer">
            <a class="genzis-btn genzis-btn--ghost genzis-btn--sm" href="{{ route('admin.galleries.index', ['language'=>$locale]) }}">Cancel</a>
            <button class="genzis-btn genzis-btn--primary genzis-btn--sm" type="submit">Save gallery</button>
        </div>
    </form>
</section>
@endsection
