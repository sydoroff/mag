<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('phone',15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * id
    user_id  - может быть null если заказ сделан без регистрации
    phone - телефон
    created_at  дата и время создания
    updated_at дата и время изменения

     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
