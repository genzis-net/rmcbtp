<?php

namespace App\Http\Requests\Admin;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        $product = $this->route('product');

        return $product instanceof Product
            ? ($this->user()?->can('update', $product) ?? false)
            : false;
    }

    protected function prepareForValidation(): void
    {
        $nameEn = $this->input('name_en') ?: $this->input('name');
        $nameFr = $this->input('name_fr') ?: $nameEn;

        $this->merge([
            'name_en' => $nameEn,
            'name_fr' => $nameFr,
            'name' => $nameEn ?: $nameFr,
        ]);
    }

    public function rules(): array
    {
        $catalog = $this->input('catalog');
        $product = $this->route('product');

        return [
            'name' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_fr' => 'required|string|max:255',
            'catalog' => 'required|in:' . implode(',', array_keys(Product::CATALOGS)),
            'description_en' => 'nullable|string',
            'description_fr' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'subcat_id' => [
                'nullable',
                Rule::exists('subcats', 'id')->whereNull('deleted_at')->where(function ($query) use ($catalog) {
                    $query->whereIn('cat_id', function ($sub) use ($catalog) {
                        $sub->select('id')->from('cats')->where('catalog', $catalog);
                    });
                }),
            ],
            'material_id' => [
                'nullable',
                Rule::exists('materials', 'id')->whereNull('deleted_at'),
            ],
            'id_number' => 'nullable|string|max:255',
            'uniq_id' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('products', 'uniq_id')->ignore($product?->id)->whereNull('deleted_at'),
            ],
            'weight' => 'nullable|numeric',
            'quantity' => 'nullable|integer|min:0',
            'is_featured' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
            'images' => 'nullable|array|max:12',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:4096',
        ];
    }
}
