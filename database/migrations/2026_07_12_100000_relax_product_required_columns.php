<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('products')) {
            return;
        }

        if (Schema::getConnection()->getDriverName() !== 'mysql') {
            return;
        }

        DB::statement('ALTER TABLE products MODIFY subcat_id BIGINT UNSIGNED NULL');
        DB::statement('ALTER TABLE products MODIFY material_id BIGINT UNSIGNED NULL');
        DB::statement('ALTER TABLE products MODIFY id_number VARCHAR(191) NULL');
        DB::statement('ALTER TABLE products MODIFY uniq_id VARCHAR(191) NULL');
    }

    public function down(): void
    {
        if (!Schema::hasTable('products')) {
            return;
        }

        if (Schema::getConnection()->getDriverName() !== 'mysql') {
            return;
        }

        DB::statement('ALTER TABLE products MODIFY subcat_id BIGINT UNSIGNED NOT NULL');
        DB::statement('ALTER TABLE products MODIFY material_id BIGINT UNSIGNED NOT NULL');
        DB::statement('ALTER TABLE products MODIFY id_number VARCHAR(191) NOT NULL');
        DB::statement('ALTER TABLE products MODIFY uniq_id VARCHAR(191) NOT NULL');
    }
};
