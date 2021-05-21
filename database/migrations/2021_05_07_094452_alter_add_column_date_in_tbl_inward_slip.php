<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAddColumnDateInTblInwardSlip extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::table('tbl_inward_slip', function (Blueprint $table) {
            $table->string('date_input',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_inward_slip', function (Blueprint $table) {
            $table->dropColumn('date_input');
        });
    }
}
