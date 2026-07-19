@extends('admin.layouts.app')
@section('title', 'FAQ')
@section('heading', $faq->question['en'] ?? 'FAQ')
@section('content')
<section class="genzis-card admin-panel">
    <p><strong>EN</strong><br>{{ $faq->answer['en'] ?? '' }}</p>
    <p><strong>FR</strong><br>{{ $faq->answer['fr'] ?? '' }}</p>
</section>
@endsection
