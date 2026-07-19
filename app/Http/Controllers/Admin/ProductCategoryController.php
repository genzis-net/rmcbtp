<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index(Request $request)
    {
        $catalog = $request->query('catalog');

        $categories = Category::withCount('subcategories')
            ->when($catalog, fn ($q) => $q->where('catalog', $catalog))
            ->latest()
            ->paginate(12)
            ->withQueryString();

        $subcategories = Subcategory::with('category')
            ->when($catalog, fn ($q) => $q->whereHas('category', fn ($c) => $c->where('catalog', $catalog)))
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('admin.product-categories.index', compact('categories', 'subcategories', 'catalog'));
    }

    public function create()
    {
        $parents = Category::orderBy('name_en')->get();

        return view('admin.product-categories.create', compact('parents'));
    }

    public function store(Request $request)
    {
        $type = $request->input('type', 'category');

        if ($type === 'subcategory') {
            $data = $request->validate([
                'name_en' => 'required|string|max:255',
                'name_fr' => 'required|string|max:255',
                'cat_id' => 'required|exists:cats,id',
            ]);

            Subcategory::create($data);

            return redirect()
                ->route('admin.product-categories.index', ['language' => app()->getLocale()])
                ->with('success', __('Subcategory created successfully.'));
        }

        $data = $request->validate([
            'catalog' => 'required|in:' . implode(',', array_keys(Product::CATALOGS)),
            'name_en' => 'required|string|max:255',
            'name_fr' => 'required|string|max:255',
            'description_en' => 'nullable|string',
            'description_fr' => 'nullable|string',
        ]);

        Category::create($data);

        return redirect()
            ->route('admin.product-categories.index', ['language' => app()->getLocale()])
            ->with('success', __('Category created successfully.'));
    }

    public function show(string $id)
    {
        $category = Category::with('subcategories')->findOrFail($id);

        return view('admin.product-categories.show', compact('category'));
    }

    public function edit(string $id)
    {
        $category = Category::findOrFail($id);

        return view('admin.product-categories.edit', compact('category'));
    }

    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);

        $data = $request->validate([
            'catalog' => 'required|in:' . implode(',', array_keys(Product::CATALOGS)),
            'name_en' => 'required|string|max:255',
            'name_fr' => 'required|string|max:255',
            'description_en' => 'nullable|string',
            'description_fr' => 'nullable|string',
        ]);

        $category->update($data);

        return redirect()
            ->route('admin.product-categories.index', ['language' => app()->getLocale()])
            ->with('success', __('Category updated successfully.'));
    }

    public function destroy(string $id)
    {
        $category = Category::with('subcategories')->withCount('subcategories')->findOrFail($id);

        if ($category->subcategories_count > 0) {
            $subcatIds = $category->subcategories->pluck('id');
            $productCount = Product::whereIn('subcat_id', $subcatIds)->count();
            if ($productCount > 0) {
                return back()->with('error', __('This category still has products. Reassign them before deleting.'));
            }

            return back()->with('error', __('Remove subcategories before deleting this category.'));
        }

        $category->delete();

        return redirect()
            ->route('admin.product-categories.index', ['language' => app()->getLocale()])
            ->with('success', __('Category deleted successfully.'));
    }
}
