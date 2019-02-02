<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLipsticksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lipsticks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('brand_id');
            $table->unsignedInteger('finish_id');
            $table->string('name');
            $table->string('description');
            $table->float('price');
            $table->string('color');
            $table->string('image');
            $table->timestamps();

            $table->foreign('brand_id')
                ->references('id')->on('brands')
                ->onDelete('cascade');
            $table->foreign('finish_id')
                ->references('id')->on('finishes')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lipsticks');
    }
}
