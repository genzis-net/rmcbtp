<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('products')) {
            return;
        }

        Schema::table('products', function (Blueprint $table) {
            if (!Schema::hasColumn('products', 'name_en')) {
                $table->string('name_en')->nullable()->after('name');
            }
            if (!Schema::hasColumn('products', 'name_fr')) {
                $table->string('name_fr')->nullable()->after('name_en');
            }
        });

        // Backfill bilingual names from legacy single name column.
        DB::table('products')->orderBy('id')->chunkById(100, function ($rows) {
            foreach ($rows as $row) {
                DB::table('products')->where('id', $row->id)->update([
                    'name_en' => $row->name_en ?: $row->name,
                    'name_fr' => $row->name_fr ?: $row->name,
                ]);
            }
        });

        // Allow same slug across catalogs (scoped uniqueness).
        if (Schema::getConnection()->getDriverName() === 'mysql') {
            try {
                Schema::table('products', function (Blueprint $table) {
                    $table->dropUnique('products_slug_unique');
                });
            } catch (\Throwable $e) {
                // Index may not exist on some environments.
            }

            Schema::table('products', function (Blueprint $table) {
                $table->unique(['catalog', 'slug'], 'products_catalog_slug_unique');
            });
        }
    }

    public function down(): void
    {
        if (!Schema::hasTable('products')) {
            return;
        }

        if (Schema::getConnection()->getDriverName() === 'mysql') {
            try {
                Schema::table('products', function (Blueprint $table) {
                    $table->dropUnique('products_catalog_slug_unique');
                    $table->unique('slug');
                });
            } catch (\Throwable $e) {
                //
            }
        }

        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products', 'name_en')) {
                $table->dropColumn('name_en');
            }
            if (Schema::hasColumn('products', 'name_fr')) {
                $table->dropColumn('name_fr');
            }
        });
    }
};
