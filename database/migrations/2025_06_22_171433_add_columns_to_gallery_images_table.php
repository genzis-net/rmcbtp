<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('gallery_images', function (Blueprint $table) {
            $table->foreignId('gallery_id')->after('id')->constrained()->onDelete('cascade');
            $table->string('title')->nullable()->after('gallery_id');
            $table->text('description')->nullable()->after('title');
            $table->string('path')->after('description');
            $table->string('alt_text')->nullable()->after('path');
            $table->integer('order')->default(0)->after('alt_text');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gallery_images', function (Blueprint $table) {
            $table->dropForeign(['gallery_id']);
            $table->dropColumn(['gallery_id', 'title', 'description', 'path', 'alt_text', 'order']);
            $table->dropSoftDeletes();
        });
    }
};
