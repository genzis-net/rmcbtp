@extends('admin.layouts.app')
@section('title', $category->name_en)
@section('heading', $category->name_en)
@section('content')
<section class="genzis-card admin-panel">
    <p>{{ $category->description_en }}</p>
    <h3 class="admin-panel__title" style="margin:16px 0">Subcategories</h3>
    <ul>
        @forelse($category->subcategories as $sub)
            <li>{{ $sub->name_en }} / {{ $sub->name_fr }}</li>
        @empty
            <li class="admin-muted">None</li>
        @endforelse
    </ul>
</section>
@endsection
