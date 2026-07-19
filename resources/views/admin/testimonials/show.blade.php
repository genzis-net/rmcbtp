@extends('admin.layouts.app')
@section('title', 'Testimonial')
@section('heading', $testimonial->client)
@section('content')
<section class="genzis-card admin-panel">
    <p><strong>EN</strong><br>{{ $testimonial->content_en }}</p>
    <p><strong>FR</strong><br>{{ $testimonial->content_fr }}</p>
    <a class="genzis-btn genzis-btn--ghost genzis-btn--sm" href="{{ route('admin.testimonials.edit', ['language'=>app()->getLocale(),'testimonial'=>$testimonial->id]) }}">Edit</a>
</section>
@endsection
