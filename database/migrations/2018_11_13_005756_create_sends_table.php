<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sends', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('division_id')->unsigned();
            $table->integer('colorcard_id')->unsigned();
            $table->integer('amount')->default(0);
            $table->string('description');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');
            $table->foreign('colorcard_id')->references('id')->on('colorcards')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sends');
    }
}
