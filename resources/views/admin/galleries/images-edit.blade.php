@extends('admin.layouts.app')
@section('title', 'Edit Image')
@section('heading', 'Edit gallery image')
@php $locale = app()->getLocale(); @endphp
@section('content')
<section class="genzis-card admin-panel">
    <form class="admin-form" method="POST" action="{{ route('admin.galleries.images.update', ['language'=>$locale,'gallery'=>$gallery,'image'=>$image]) }}">
        @csrf @method('PUT')
        <div class="genzis-field">
            <label for="title">Title</label>
            <input id="title" name="title" value="{{ old('title', $image->title) }}">
        </div>
        <div class="genzis-field">
            <label for="alt_text">Alt text</label>
            <input id="alt_text" name="alt_text" value="{{ old('alt_text', $image->alt_text) }}">
        </div>
        <div class="genzis-field">
            <label for="description">Description</label>
            <textarea id="description" name="description">{{ old('description', $image->description) }}</textarea>
        </div>
        <div class="genzis-field">
            <label for="order">Order</label>
            <input id="order" type="number" name="order" value="{{ old('order', $image->order) }}">
        </div>
        <button class="genzis-btn genzis-btn--primary genzis-btn--sm" type="submit">Update</button>
    </form>
</section>
@endsection
