<?php

namespace App\Http\Controllers\Frontoffice;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Material;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CatalogController extends Controller
{
    public function index(Request $request, string $catalog): View
    {
        $catalog = $this->resolveCatalog($catalog);
        $filters = $this->scopedFilters($request, $catalog);

        $products = Product::query()
            ->active()
            ->catalog($catalog)
            ->with(['images' => fn ($q) => $q->orderBy('id'), 'subcategory.category', 'material'])
            ->when($filters['subcat'], fn ($q, $id) => $q->where('subcat_id', $id))
            ->when($filters['material'], fn ($q, $id) => $q->where('material_id', $id))
            ->when($filters['cat'], function ($q, $catId) {
                $q->whereHas('subcategory', fn ($sub) => $sub->where('cat_id', $catId));
            })
            ->search($filters['q'])
            ->when($filters['sort'] === 'price_asc', fn ($q) => $q->orderBy('price'))
            ->when($filters['sort'] === 'price_desc', fn ($q) => $q->orderByDesc('price'))
            ->when($filters['sort'] === 'name', function ($q) {
                $column = app()->getLocale() === 'fr' ? 'name_fr' : 'name_en';
                $q->orderByRaw("COALESCE({$column}, name) asc");
            })
            ->when(! in_array($filters['sort'], ['price_asc', 'price_desc', 'name'], true), fn ($q) => $q->latest())
            ->paginate(12)
            ->withQueryString();

        $categories = Category::catalog($catalog)
            ->with(['subcategories' => fn ($q) => $q->orderBy('name_en')])
            ->orderBy('name_en')
            ->get();

        $materials = Material::query()
            ->whereHas('products', fn ($q) => $q->active()->catalog($catalog))
            ->orderBy('name_en')
            ->get();

        return view('pages.catalog.index', [
            'catalog' => $catalog,
            'catalogLabel' => Product::CATALOGS[$catalog],
            'products' => $products,
            'categories' => $categories,
            'materials' => $materials,
            'filters' => $filters,
            'landingRoute' => $catalog === Product::CATALOG_SIMS_DECOR ? 'simsdecor' : 'quincaillerie',
        ]);
    }

    public function show(string $catalog, string $product): View
    {
        $catalog = $this->resolveCatalog($catalog);

        $item = Product::query()
            ->active()
            ->catalog($catalog)
            ->where('slug', $product)
            ->with(['images' => fn ($q) => $q->orderBy('id'), 'subcategory.category', 'material'])
            ->firstOrFail();

        $related = Product::query()
            ->active()
            ->catalog($catalog)
            ->where('id', '!=', $item->id)
            ->when($item->subcat_id, fn ($q) => $q->where('subcat_id', $item->subcat_id))
            ->with(['images' => fn ($q) => $q->orderBy('id')])
            ->latest()
            ->take(4)
            ->get();

        return view('pages.catalog.show', [
            'catalog' => $catalog,
            'catalogLabel' => Product::CATALOGS[$catalog],
            'product' => $item,
            'related' => $related,
            'landingRoute' => $catalog === Product::CATALOG_SIMS_DECOR ? 'simsdecor' : 'quincaillerie',
        ]);
    }

    protected function resolveCatalog(string $catalog): string
    {
        $map = [
            'quincaillerie' => Product::CATALOG_QUINCAILLERIE,
            'sims-decor' => Product::CATALOG_SIMS_DECOR,
        ];

        abort_unless(isset($map[$catalog]), 404);

        return $map[$catalog];
    }

    protected function scopedFilters(Request $request, string $catalog): array
    {
        $catId = $request->integer('cat') ?: null;
        $subcatId = $request->integer('subcat') ?: null;
        $materialId = $request->integer('material') ?: null;

        if ($catId && ! Category::catalog($catalog)->whereKey($catId)->exists()) {
            $catId = null;
        }

        if ($subcatId) {
            $validSubcat = Category::catalog($catalog)
                ->whereHas('subcategories', fn ($q) => $q->whereKey($subcatId))
                ->exists();
            if (! $validSubcat) {
                $subcatId = null;
            }
        }

        if ($materialId && ! Material::whereKey($materialId)->whereHas('products', fn ($q) => $q->active()->catalog($catalog))->exists()) {
            $materialId = null;
        }

        return [
            'q' => trim((string) $request->query('q', '')),
            'cat' => $catId,
            'subcat' => $subcatId,
            'material' => $materialId,
            'sort' => (string) $request->query('sort', 'latest'),
        ];
    }
}
