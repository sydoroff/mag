<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_to_products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('orders_id');
            $table->foreign('orders_id')->references('id')->on('orders');
            $table->unsignedInteger('products_id');
            $table->foreign('products_id')->references('id')->on('products');
            $table->decimal('price');
            $table->timestamps();
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_to_products');
    }
}
