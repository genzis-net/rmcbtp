<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('subcat_id');
            $table->integer('material_id');
            $table->string('id_number');
            $table->string('uniq_id');
            $table->integer('weight')->nullable();
            $table->integer('quantity')->default(0);
            $table->integer('mesure_h')->nullable();
            $table->integer('mesure_w')->nullable();
            $table->integer('mesure_e')->nullable();
            $table->integer('diameter')->nullable();
            $table->integer('price');
            $table->text('description_en')->nullable();
            $table->text('description_fr')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
