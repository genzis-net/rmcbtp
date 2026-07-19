@extends('admin.layouts.app')
@section('title', 'Settings')
@section('heading', 'Site settings')
@section('subheading', 'Contact and brand details used across the site')
@section('content')
<section class="genzis-card admin-panel">
    <form class="admin-form" method="POST" action="{{ route('admin.settings.update', ['language'=>app()->getLocale()]) }}">
        @csrf

        <div class="admin-form__section">
            <div class="admin-form__section-head">
                <h3>Brand</h3>
                <p>Site name and short description.</p>
            </div>
            <div class="admin-form-grid">
                <div class="genzis-field full">
                    <label for="site_name">Site name</label>
                    <input id="site_name" name="site_name" value="{{ old('site_name', $settings['site_name'] ?? '') }}" required>
                </div>
                <div class="genzis-field full">
                    <label for="site_description">Site description</label>
                    <textarea id="site_description" name="site_description">{{ old('site_description', $settings['site_description'] ?? '') }}</textarea>
                </div>
            </div>
        </div>

        <div class="admin-form__section">
            <div class="admin-form__section-head">
                <h3>Contact</h3>
                <p>Shown in the header, footer, and contact page.</p>
            </div>
            <div class="admin-form-grid">
                <div class="genzis-field">
                    <label for="contact_email">Contact email</label>
                    <input id="contact_email" type="email" name="contact_email" value="{{ old('contact_email', $settings['contact_email'] ?? '') }}" required>
                </div>
                <div class="genzis-field">
                    <label for="contact_phone">Contact phone</label>
                    <input id="contact_phone" name="contact_phone" value="{{ old('contact_phone', $settings['contact_phone'] ?? '') }}" required>
                </div>
                <div class="genzis-field full">
                    <label for="contact_address">Address</label>
                    <input id="contact_address" name="contact_address" value="{{ old('contact_address', $settings['contact_address'] ?? '') }}" required>
                </div>
            </div>
        </div>

        <div class="admin-form__section">
            <div class="admin-form__section-head">
                <h3>Web presence</h3>
                <p>Optional public links.</p>
            </div>
            <div class="admin-form-grid">
                <div class="genzis-field">
                    <label for="contact_website">Website</label>
                    <input id="contact_website" name="contact_website" value="{{ old('contact_website', $settings['contact_website'] ?? '') }}">
                </div>
                <div class="genzis-field">
                    <label for="contact_facebook">Facebook URL</label>
                    <input id="contact_facebook" name="contact_facebook" value="{{ old('contact_facebook', $settings['contact_facebook'] ?? '') }}">
                </div>
            </div>
        </div>

        <div class="admin-form__footer">
            <button class="genzis-btn genzis-btn--primary genzis-btn--sm" type="submit">Save settings</button>
        </div>
    </form>
</section>
@endsection
