<?php

/**
 * Stub table retired — real blog content lives in `articles`.
 * Kept so environments that already ran the old migration stay consistent.
 */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('blog_posts');
    }

    public function down(): void
    {
        // Intentionally empty — table was never used.
    }
};
