<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePost1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post1s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('make_id');
            $table->integer('model_id');
            $table->string('make');
            $table->string('model');
            $table->string('license');            
            $table->string('image2');                       
            $table->integer('user_id');
            $table->string('fname');
            $table->string('lname');
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
        Schema::dropIfExists('post1s');
    }
}
