<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('catalog', 32)->default('quincaillerie')->after('slug');
            $table->boolean('is_featured')->default(false)->after('catalog');
            $table->boolean('is_active')->default(true)->after('is_featured');
            $table->index(['catalog', 'is_active']);
        });

        Schema::table('cats', function (Blueprint $table) {
            $table->string('catalog', 32)->default('quincaillerie')->after('id');
            $table->index('catalog');
        });

        // Existing stock belongs to hardware catalogue by default
        DB::table('products')->update([
            'catalog' => 'quincaillerie',
            'is_active' => true,
        ]);

        DB::table('cats')->update(['catalog' => 'quincaillerie']);
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropIndex(['catalog', 'is_active']);
            $table->dropColumn(['catalog', 'is_featured', 'is_active']);
        });

        Schema::table('cats', function (Blueprint $table) {
            $table->dropIndex(['catalog']);
            $table->dropColumn('catalog');
        });
    }
};
