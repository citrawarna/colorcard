<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnReasonRepair extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('repair_stocks', function (Blueprint $table) {
            $table->enum('reason', ['rusak', 'hilang', 'terjual', 'penyesuaian'])->after('repair_qty');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('repair_stocks', function (Blueprint $table) {
            //
        });
    }
}
