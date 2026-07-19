<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $driver = Schema::getConnection()->getDriverName();

        // Normalize subcats.cat_id from text to unsigned bigint (MySQL).
        if ($driver === 'mysql' && Schema::hasTable('subcats') && Schema::hasColumn('subcats', 'cat_id')) {
            DB::statement("UPDATE subcats SET cat_id = NULL WHERE cat_id IS NOT NULL AND cat_id NOT REGEXP '^[0-9]+$'");
            DB::statement('ALTER TABLE subcats MODIFY cat_id BIGINT UNSIGNED NULL');
        }

        if (Schema::hasTable('products')) {
            Schema::table('products', function (Blueprint $table) {
                if (Schema::hasColumn('products', 'slug') && !$this->indexExists('products', 'products_slug_unique')) {
                    $table->unique('slug');
                }
                if (Schema::hasColumn('products', 'subcat_id') && !$this->indexExists('products', 'products_subcat_id_index')) {
                    $table->index('subcat_id');
                }
                if (Schema::hasColumn('products', 'material_id') && !$this->indexExists('products', 'products_material_id_index')) {
                    $table->index('material_id');
                }
            });
        }

        if (Schema::hasTable('prod_images') && Schema::hasColumn('prod_images', 'product_id') && !$this->indexExists('prod_images', 'prod_images_product_id_index')) {
            Schema::table('prod_images', function (Blueprint $table) {
                $table->index('product_id');
            });
        }

        if (Schema::hasTable('subcats') && !$this->indexExists('subcats', 'subcats_cat_id_index')) {
            Schema::table('subcats', function (Blueprint $table) {
                $table->index('cat_id');
            });
        }

        if (Schema::hasTable('cats') && !Schema::hasColumn('cats', 'deleted_at')) {
            Schema::table('cats', function (Blueprint $table) {
                $table->softDeletes();
            });
        }

        if (Schema::hasTable('references') && !Schema::hasColumn('references', 'deleted_at')) {
            Schema::table('references', function (Blueprint $table) {
                $table->softDeletes();
            });
        }

        Schema::dropIfExists('blog_posts');
        Schema::dropIfExists('testimonials');
    }

    public function down(): void
    {
        if (Schema::hasTable('cats') && Schema::hasColumn('cats', 'deleted_at')) {
            Schema::table('cats', function (Blueprint $table) {
                $table->dropSoftDeletes();
            });
        }

        if (Schema::hasTable('references') && Schema::hasColumn('references', 'deleted_at')) {
            Schema::table('references', function (Blueprint $table) {
                $table->dropSoftDeletes();
            });
        }
    }

    protected function indexExists(string $table, string $indexName): bool
    {
        $connection = Schema::getConnection();
        $driver = $connection->getDriverName();

        if ($driver === 'sqlite') {
            foreach ($connection->select("PRAGMA index_list('{$table}')") as $index) {
                if (($index->name ?? null) === $indexName) {
                    return true;
                }
            }

            return false;
        }

        if ($driver === 'mysql') {
            $db = $connection->getDatabaseName();
            $rows = $connection->select(
                'SELECT 1 FROM information_schema.statistics WHERE table_schema = ? AND table_name = ? AND index_name = ? LIMIT 1',
                [$db, $table, $indexName]
            );

            return count($rows) > 0;
        }

        return false;
    }
};
