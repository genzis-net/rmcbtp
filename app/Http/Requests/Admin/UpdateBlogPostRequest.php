<?php

namespace App\Http\Requests\Admin;

use App\Models\Article;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogPostRequest extends FormRequest
{
    public function authorize(): bool
    {
        $post = $this->route('blog_post');

        return $post instanceof Article
            ? ($this->user()?->can('update', $post) ?? false)
            : false;
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
