<?php

namespace App\Http\Requests\Admin;

use App\Models\Article;
use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('create', Article::class) ?? false;
    }

    public function rules(): array
    {
        return [
            'title_en' => 'required|string|max:255',
            'title_fr' => 'required|string|max:255',
            'content_en' => 'required|string',
            'content_fr' => 'required|string',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'status' => 'nullable|boolean',
        ];
    }
}
