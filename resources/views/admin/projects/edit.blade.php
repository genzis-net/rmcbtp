@extends('admin.layouts.app')
@section('title', isset($project) ? 'Edit Project' : 'New Project')
@section('heading', isset($project) ? 'Edit project' : 'New project')
@section('subheading', 'Portfolio reference shown on the public site')
@php $locale = app()->getLocale(); $item = $project ?? null; @endphp
@section('content')
<section class="genzis-card admin-panel">
    <form class="admin-form admin-form--wide" method="POST" enctype="multipart/form-data"
          action="{{ $item ? route('admin.projects.update', ['language'=>$locale,'project'=>$item]) : route('admin.projects.store', ['language'=>$locale]) }}">
        @csrf
        @if($item) @method('PUT') @endif

        <div class="admin-form__section">
            <div class="admin-form__section-head">
                <h3>Project identity</h3>
                <p>Titles and key facts for the portfolio listing.</p>
            </div>
            <div class="admin-form-grid">
                <div class="genzis-field">
                    <label for="title_en">Title (EN)</label>
                    <input id="title_en" name="title_en" value="{{ old('title_en', $item->title_en ?? '') }}" required>
                </div>
                <div class="genzis-field">
                    <label for="title_fr">Title (FR)</label>
                    <input id="title_fr" name="title_fr" value="{{ old('title_fr', $item->title_fr ?? '') }}" required>
                </div>
                <div class="genzis-field">
                    <label for="client">Client</label>
                    <input id="client" name="client" value="{{ old('client', $item->client ?? '') }}" required>
                </div>
                <div class="genzis-field">
                    <label for="year">Year</label>
                    <input id="year" type="number" name="year" value="{{ old('year', $item->year ?? date('Y')) }}" required>
                </div>
                <div class="genzis-field">
                    <label for="location">Location</label>
                    <input id="location" name="location" value="{{ old('location', $item->location ?? '') }}" required>
                </div>
                <div class="genzis-field">
                    <label for="project_type">Project type</label>
                    <input id="project_type" name="project_type" value="{{ old('project_type', $item->project_type ?? 'Construction') }}" required>
                    <p class="genzis-hint">Examples: Construction, Renovation, Architecture.</p>
                </div>
            </div>
        </div>

        <div class="admin-form__section">
            <div class="admin-form__section-head">
                <h3>Description</h3>
                <p>Story and scope in both languages.</p>
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

        <div class="admin-form__section">
            <div class="admin-form__section-head">
                <h3>Images</h3>
                <p>Upload one or more project photos.</p>
            </div>
            <div class="admin-form-grid">
                <div class="genzis-field full">
                    <label for="images">Project images</label>
                    <input id="images" type="file" name="images[]" accept="image/*" multiple>
                    <p class="genzis-hint">You can select multiple files at once.</p>
                </div>
            </div>
        </div>

        <div class="admin-form__footer">
            <a class="genzis-btn genzis-btn--ghost genzis-btn--sm" href="{{ route('admin.projects.index', ['language'=>$locale]) }}">Cancel</a>
            <button class="genzis-btn genzis-btn--primary genzis-btn--sm" type="submit">Save project</button>
        </div>
    </form>
</section>
@endsection
