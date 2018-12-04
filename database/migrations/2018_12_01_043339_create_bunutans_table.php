<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBunutansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bunutans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('nabunot');
            $table->integer('active');
            $table->integer('chosen');
            $table->string('ip');
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
        Schema::dropIfExists('bunutans');
    }
}
