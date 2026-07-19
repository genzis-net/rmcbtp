@extends('admin.layouts.app')
@section('title', isset($faq) ? 'Edit FAQ' : 'New FAQ')
@section('heading', isset($faq) ? 'Edit FAQ' : 'New FAQ')
@section('subheading', 'Bilingual questions and answers')
@php $locale = app()->getLocale(); $item = $faq ?? null; @endphp
@section('content')
<section class="genzis-card admin-panel">
    <form class="admin-form" method="POST" action="{{ $item ? route('admin.faqs.update', ['language'=>$locale,'faq'=>$item]) : route('admin.faqs.store', ['language'=>$locale]) }}">
        @csrf
        @if($item) @method('PUT') @endif

        <div class="admin-form__section">
            <div class="admin-form__section-head">
                <h3>Questions</h3>
                <p>Short, clear prompts in both languages.</p>
            </div>
            <div class="admin-form-grid">
                <div class="genzis-field">
                    <label for="question_en">Question (EN)</label>
                    <input id="question_en" name="question_en" value="{{ old('question_en', $item->question['en'] ?? '') }}" required>
                </div>
                <div class="genzis-field">
                    <label for="question_fr">Question (FR)</label>
                    <input id="question_fr" name="question_fr" value="{{ old('question_fr', $item->question['fr'] ?? '') }}" required>
                </div>
            </div>
        </div>

        <div class="admin-form__section">
            <div class="admin-form__section-head">
                <h3>Answers</h3>
                <p>Full responses shown on the FAQ page.</p>
            </div>
            <div class="admin-form-grid">
                <div class="genzis-field full">
                    <label for="answer_en">Answer (EN)</label>
                    <textarea id="answer_en" name="answer_en" required>{{ old('answer_en', $item->answer['en'] ?? '') }}</textarea>
                </div>
                <div class="genzis-field full">
                    <label for="answer_fr">Answer (FR)</label>
                    <textarea id="answer_fr" name="answer_fr" required>{{ old('answer_fr', $item->answer['fr'] ?? '') }}</textarea>
                </div>
            </div>
        </div>

        <div class="admin-form__footer">
            <a class="genzis-btn genzis-btn--ghost genzis-btn--sm" href="{{ route('admin.faqs.index', ['language'=>$locale]) }}">Cancel</a>
            <button class="genzis-btn genzis-btn--primary genzis-btn--sm" type="submit">Save FAQ</button>
        </div>
    </form>
</section>
@endsection
