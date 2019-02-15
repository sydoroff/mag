<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders_products', function (Blueprint $table) {
            $table->foreign('orders_id')->onDelete('cascade');
            $table->foreign('products_id')->onDelete('cascade');
        });
        Schema::table('categories_products', function (Blueprint $table) {
            $table->foreign('categories_id')->onDelete('cascade');
            $table->foreign('products_id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
