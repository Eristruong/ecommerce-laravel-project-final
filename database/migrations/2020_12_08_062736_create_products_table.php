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
            $table->bigIncrements('productID');
            $table->unsignedBigInteger('categoryID');
            $table->string('productName');
            $table->string('productImage')->nullable();
            $table->decimal('listPrice')->default(0);
            $table->decimal('discountPercent')->default(0);
            $table->text('description')->nullable();
            $table->timestamps();
            $table->foreign('categoryID')->references('categoryID')->on('categories');
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