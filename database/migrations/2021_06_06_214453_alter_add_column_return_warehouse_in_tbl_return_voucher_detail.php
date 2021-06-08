<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAddColumnReturnWarehouseInTblReturnVoucherDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_return_voucher_detail', function (Blueprint $table) {
             $table->Integer('return_warehouse_id');
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
            $table->dropColumn('return_warehouse_id');
        });
    }
}
