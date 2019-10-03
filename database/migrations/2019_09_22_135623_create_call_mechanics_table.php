<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCallMechanicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('callmechanics', function (Blueprint $table) {
            $table->bigIncrements('id');
         
            $table->string('fname');
            $table->string('lname');
            $table->string('info');
            $table->string('cartel');
            $table->string('image3');
            $table->string('lat');
            $table->string('long');
  
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
        Schema::dropIfExists('call_mechanics');
    }
}
