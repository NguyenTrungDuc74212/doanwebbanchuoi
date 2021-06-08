<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnReturnQuantityInTblReturnVoucherDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_return_voucher_detail', function (Blueprint $table) {
            $table->Integer('return_quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_return_voucher_detail', function (Blueprint $table) {
            $table->dropColumn('return_quantity');
        });
    }
}
