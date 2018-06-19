<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Keys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rating', function($table) {
            $table->integer('user')->references('id')->on('users');
            $table->integer('dish')->references('id')->on('dishes');
        });
        Schema::table('orders', function($table) {
            $table->integer('user_id')->references('id')->on('users');
        });
        Schema::table('orders_dishes', function($table) {
            $table->integer('order_id')->references('id')->on('orders');
            $table->integer('dish_id')->references('id')->on('dishes');
        });
        Schema::table('dishes_ingredients', function($table) {
            $table->integer('dish_id')->references('id')->on('dishes');
            $table->integer('ingredient_id')->references('id')->on('ingredients');
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
