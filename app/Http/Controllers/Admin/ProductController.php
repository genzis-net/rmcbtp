<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;
use App\Models\Material;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Product::class, 'product');
    }

    public function index(Request $request)
    {
        $catalog = $request->query('catalog');

        $products = Product::with(['subcategory', 'material', 'images'])
            ->when($catalog, fn ($q) => $q->where('catalog', $catalog))
            ->when($request->filled('q'), fn ($q) => $q->search($request->query('q')))
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('admin.products.index', compact('products', 'catalog'));
    }

    public function create()
    {
        return view('admin.products.create', $this->formData());
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        $data['uniq_id'] = $data['uniq_id'] ?: 'RMC-' . strtoupper(Str::random(8));
        $data['id_number'] = $data['id_number'] ?: $data['uniq_id'];
        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active'] = $request->boolean('is_active');

        $product = Product::create($data);
        $this->storeImages($request, $product);

        return redirect()
            ->route('admin.products.show', ['language' => app()->getLocale(), 'product' => $product])
            ->with('success', __('Product created successfully.'));
    }

    public function show(Product $product)
    {
        $product->load(['subcategory', 'material', 'images']);

        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $product->load('images');

        return view('admin.products.edit', array_merge(
            $this->formData(),
            compact('product')
        ));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active'] = $request->boolean('is_active');
        $product->update($data);
        $this->storeImages($request, $product);

        return redirect()
            ->route('admin.products.show', ['language' => app()->getLocale(), 'product' => $product])
            ->with('success', __('Product updated successfully.'));
    }

    public function destroy(Product $product)
    {
        $product->images()->each(fn ($image) => $image->delete());
        $product->delete();

        return redirect()
            ->route('admin.products.index', ['language' => app()->getLocale()])
            ->with('success', __('Product deleted successfully.'));
    }

    protected function formData(): array
    {
        return [
            'categories' => Subcategory::with('category')->orderBy('name_en')->get(),
            'materials' => Material::orderBy('name_en')->get(),
            'catalogs' => Product::CATALOGS,
        ];
    }

    protected function storeImages(Request $request, Product $product): void
    {
        foreach ((array) $request->file('images', []) as $file) {
            if (!$file) {
                continue;
            }

            $src = $file->store('products/' . $product->id, 'public');
            $product->images()->create(['src' => $src]);
        }
    }
}
