<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructionsLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructions_likes', function (Blueprint $table) {
            $table->increments('id');            
            $table->integer('user_id');
            $table->integer('instructions_id');    
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
        Schema::dropIfExists('instructions_likes');
    }
}
