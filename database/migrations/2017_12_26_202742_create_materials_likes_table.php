<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialsLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials_likes', function (Blueprint $table) {
            $table->increments('id');            
            $table->integer('user_id')->unsigned();
            $table->integer('materials_id')->unsigned();          
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('materials_id')->references('id')->on('materials');    
            $table->integer('usefull')->nullable()->default('0'); 
            $table->integer('not_usefull')->nullable()->default('0');
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
        Schema::dropIfExists('materials_likes');
    }
}
