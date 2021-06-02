<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTblInwardSlipDetailColExpirationDate extends Migration
{
      /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_inward_slip_details', function (Blueprint $table) {
             $table->string('expiration_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_inward_slip_details', function (Blueprint $table) {
            $table->dropColumn('expiration_date');
        });
    }
}