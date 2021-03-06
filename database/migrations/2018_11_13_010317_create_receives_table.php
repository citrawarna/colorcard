<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receives', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('colorcard_id')->unsigned();
            $table->integer('qty')->default(0);
            $table->string('descriptions')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('colorcard_id')->references('id')->on('color_cards')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receives');
    }
}
