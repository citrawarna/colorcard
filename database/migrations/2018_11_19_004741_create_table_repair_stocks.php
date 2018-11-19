<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRepairStocks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repair_stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('colorcard_id')->unsigned();
            $table->integer('division_id')->nullable()->unsigned();
            $table->date('date');
            $table->integer('repair_qty');
            $table->timestamps();
            $table->foreign('colorcard_id')->references('id')->on('color_cards')->onDelete('cascade');
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('repair_stocks');
    }
}
