<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone',11);
            $table->integer('role')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('dishes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 40);
            $table->decimal('price', 5, 2);
            $table->string('photo_url', 100);
            $table->timestamps();
        });
        Schema::create('ingredients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20);
            $table->timestamps();
        });
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            //$table->integer('user_id');
            $table->integer('status')->default(0);
            $table->decimal('sum', 5, 2);
            $table->string('address');
            $table->datetime('delivery')->nullable();
            $table->timestamps();
        });
        Schema::create('orders_dishes', function (Blueprint $table) {
            //$table->integer('order_id');
            //$table->integer('dish_id');
            $table->integer('count');
            $table->timestamps();
        });
        Schema::create('dishes_ingredients', function (Blueprint $table) {
            //$table->integer('dish_id');
            //$table->integer('ingredient_id');
            $table->timestamps();
        });
        Schema::create('rating', function (Blueprint $table) {
            //$table->integer('user');
            //$table->integer('dish');
            $table->integer('score');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {/*
        Schema::dropIfExists('users');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('rating');
        Schema::dropIfExists('dishes_ingredients');
        Schema::dropIfExists('orders_dishes');
        Schema::dropIfExists('dishes');
        Schema::dropIfExists('ingredients');*/
    }
}
