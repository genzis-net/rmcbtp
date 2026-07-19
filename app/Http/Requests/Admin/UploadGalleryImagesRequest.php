<?php

namespace App\Http\Requests\Admin;

use App\Models\Gallery;
use Illuminate\Foundation\Http\FormRequest;

class UploadGalleryImagesRequest extends FormRequest
{
    public function authorize(): bool
    {
        $gallery = $this->route('gallery');

        return $gallery instanceof Gallery
            ? ($this->user()?->can('update', $gallery) ?? false)
            : false;
    }

    public function rules(): array
    {
        return [
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:4096',
            'title' => 'nullable|string|max:255',
            'alt_text' => 'nullable|string|max:255',
        ];
    }
}
