<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::getConnection()->getDriverName() !== 'mysql') {
            return;
        }

        // Align FK column types with Laravel $table->id() (BIGINT UNSIGNED).
        // Legacy columns were INT/TEXT and cause errno 150 otherwise.
        if (Schema::hasTable('subcats') && Schema::hasColumn('subcats', 'cat_id')) {
            DB::statement("UPDATE subcats SET cat_id = NULL WHERE cat_id IS NOT NULL AND cat_id NOT REGEXP '^[0-9]+$'");
            DB::statement('ALTER TABLE subcats MODIFY cat_id BIGINT UNSIGNED NULL');
        }

        if (Schema::hasTable('products')) {
            if (Schema::hasColumn('products', 'subcat_id')) {
                DB::statement('ALTER TABLE products MODIFY subcat_id BIGINT UNSIGNED NULL');
            }
            if (Schema::hasColumn('products', 'material_id')) {
                DB::statement('ALTER TABLE products MODIFY material_id BIGINT UNSIGNED NULL');
            }
        }

        if (Schema::hasTable('prod_images') && Schema::hasColumn('prod_images', 'product_id')) {
            DB::statement('ALTER TABLE prod_images MODIFY product_id BIGINT UNSIGNED NULL');
        }

        // Null/delete orphans before adding constraints.
        if (Schema::hasTable('subcats') && Schema::hasTable('cats')) {
            DB::statement('UPDATE subcats SET cat_id = NULL WHERE cat_id IS NOT NULL AND cat_id NOT IN (SELECT id FROM cats)');
        }

        if (Schema::hasTable('products')) {
            if (Schema::hasTable('subcats')) {
                DB::statement('UPDATE products SET subcat_id = NULL WHERE subcat_id IS NOT NULL AND subcat_id NOT IN (SELECT id FROM subcats)');
            }
            if (Schema::hasTable('materials')) {
                DB::statement('UPDATE products SET material_id = NULL WHERE material_id IS NOT NULL AND material_id NOT IN (SELECT id FROM materials)');
            }
        }

        if (Schema::hasTable('prod_images') && Schema::hasTable('products')) {
            DB::statement('DELETE FROM prod_images WHERE product_id IS NOT NULL AND product_id NOT IN (SELECT id FROM products)');
        }

        $this->addForeignIfMissing('subcats', 'subcats_cat_id_foreign', function (Blueprint $table) {
            $table->foreign('cat_id')->references('id')->on('cats')->nullOnDelete();
        });

        $this->addForeignIfMissing('products', 'products_subcat_id_foreign', function (Blueprint $table) {
            $table->foreign('subcat_id')->references('id')->on('subcats')->nullOnDelete();
        });

        $this->addForeignIfMissing('products', 'products_material_id_foreign', function (Blueprint $table) {
            $table->foreign('material_id')->references('id')->on('materials')->nullOnDelete();
        });

        $this->addForeignIfMissing('prod_images', 'prod_images_product_id_foreign', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        if (Schema::getConnection()->getDriverName() !== 'mysql') {
            return;
        }

        Schema::table('prod_images', function (Blueprint $table) {
            if ($this->foreignExists('prod_images', 'prod_images_product_id_foreign')) {
                $table->dropForeign(['product_id']);
            }
        });

        Schema::table('products', function (Blueprint $table) {
            if ($this->foreignExists('products', 'products_subcat_id_foreign')) {
                $table->dropForeign(['subcat_id']);
            }
            if ($this->foreignExists('products', 'products_material_id_foreign')) {
                $table->dropForeign(['material_id']);
            }
        });

        Schema::table('subcats', function (Blueprint $table) {
            if ($this->foreignExists('subcats', 'subcats_cat_id_foreign')) {
                $table->dropForeign(['cat_id']);
            }
        });
    }

    protected function addForeignIfMissing(string $table, string $constraint, callable $callback): void
    {
        if (! Schema::hasTable($table) || $this->foreignExists($table, $constraint)) {
            return;
        }

        Schema::table($table, $callback);
    }

    protected function foreignExists(string $table, string $constraint): bool
    {
        $db = Schema::getConnection()->getDatabaseName();
        $rows = DB::select(
            'SELECT 1 FROM information_schema.table_constraints WHERE constraint_schema = ? AND table_name = ? AND constraint_name = ? AND constraint_type = ? LIMIT 1',
            [$db, $table, $constraint, 'FOREIGN KEY']
        );

        return count($rows) > 0;
    }
};
