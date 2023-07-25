<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippings', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('bill_id');
            $table->string('order_code');
            $table->string('trans_type');
            $table->integer('total_fee');
            $table->dateTime('expected_delivery_time');
            $table->timestamps();

            // Thêm foreign key reference
            $table->foreign('bill_id')->references('bill_id')->on('bills')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shippings');
    }
}
