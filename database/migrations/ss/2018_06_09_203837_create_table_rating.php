<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRating extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating', function (Blueprint $table) {
            $table->integer('user');
            $table->integer('dish');
            $table->integer('score');
            $table->timestamps();
        });
        Schema::table('rating', function($table) {
            $table->foreign('user')->references('id')->on('users');
            $table->foreign('dish')->references('id')->on('dishes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schemea::drop('rating');
    }
}
