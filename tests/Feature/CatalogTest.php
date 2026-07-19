<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CatalogTest extends TestCase
{
    use RefreshDatabase;

    protected function makeProduct(array $overrides = []): Product
    {
        $defaults = [
            'name' => 'Sample Product',
            'name_en' => 'Sample Product',
            'name_fr' => 'Produit exemple',
            'catalog' => Product::CATALOG_QUINCAILLERIE,
            'price' => 1000,
            'subcat_id' => 1,
            'material_id' => 1,
            'id_number' => 'TEST-' . uniqid(),
            'uniq_id' => 'UID-' . uniqid(),
            'is_active' => true,
            'is_featured' => false,
        ];

        return Product::create(array_merge($defaults, $overrides));
    }

    public function test_quincaillerie_catalog_lists_only_its_active_products(): void
    {
        $hardware = $this->makeProduct([
            'name' => 'Visible Bolt',
            'name_en' => 'Visible Bolt',
            'name_fr' => 'Boulon visible',
            'catalog' => Product::CATALOG_QUINCAILLERIE,
        ]);
        $this->makeProduct([
            'name' => 'Hidden Bolt',
            'name_en' => 'Hidden Bolt',
            'catalog' => Product::CATALOG_QUINCAILLERIE,
            'is_active' => false,
        ]);
        $this->makeProduct([
            'name' => 'Decor Sofa',
            'name_en' => 'Decor Sofa',
            'catalog' => Product::CATALOG_SIMS_DECOR,
        ]);

        $response = $this->get('/en/catalog/quincaillerie');

        $response->assertOk();
        $response->assertSee('Visible Bolt');
        $response->assertDontSee('Hidden Bolt');
        $response->assertDontSee('Decor Sofa');
        $response->assertSee($hardware->localizedName('en'));
    }

    public function test_sims_decor_catalog_is_scoped(): void
    {
        $this->makeProduct([
            'name' => 'Decor Chair',
            'name_en' => 'Decor Chair',
            'catalog' => Product::CATALOG_SIMS_DECOR,
        ]);
        $this->makeProduct([
            'name' => 'Hardware Screw',
            'name_en' => 'Hardware Screw',
            'catalog' => Product::CATALOG_QUINCAILLERIE,
        ]);

        $this->get('/en/catalog/sims-decor')
            ->assertOk()
            ->assertSee('Decor Chair')
            ->assertDontSee('Hardware Screw');
    }

    public function test_product_show_404s_when_catalog_mismatches(): void
    {
        $product = $this->makeProduct([
            'name' => 'Cross Catalog Item',
            'name_en' => 'Cross Catalog Item',
            'catalog' => Product::CATALOG_QUINCAILLERIE,
        ]);

        $this->get('/en/catalog/sims-decor/' . $product->slug)->assertNotFound();
        $this->get('/en/catalog/quincaillerie/' . $product->slug)->assertOk();
    }

    public function test_inactive_product_is_not_public(): void
    {
        $product = $this->makeProduct([
            'name' => 'Inactive Item',
            'name_en' => 'Inactive Item',
            'catalog' => Product::CATALOG_QUINCAILLERIE,
            'is_active' => false,
        ]);

        $this->get('/en/catalog/quincaillerie/' . $product->slug)->assertNotFound();
    }

    public function test_unknown_catalog_slug_returns_404(): void
    {
        $this->get('/en/catalog/rmc-btp')->assertNotFound();
    }

    public function test_french_locale_shows_localized_product_name(): void
    {
        $this->makeProduct([
            'name' => 'Oak Table',
            'name_en' => 'Oak Table',
            'name_fr' => 'Table en chêne',
            'catalog' => Product::CATALOG_SIMS_DECOR,
        ]);

        $this->get('/fr/catalog/sims-decor')
            ->assertOk()
            ->assertSee('Table en chêne')
            ->assertDontSee('Oak Table');
    }
}
