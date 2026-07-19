<?php

/**
 * Stub table retired — real testimonials live in `testimonis`.
 */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('testimonials');
    }

    public function down(): void
    {
        // Intentionally empty — table was never used.
    }
};
