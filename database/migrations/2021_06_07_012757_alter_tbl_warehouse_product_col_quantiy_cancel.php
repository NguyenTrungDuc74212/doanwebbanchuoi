<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTblWarehouseProductColQuantiyCancel extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_warehouse_product', function (Blueprint $table) {
            $table->Integer('quantity_cancel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_warehouse_product', function (Blueprint $table) {
            $table->dropColumn('quantity_cancel');
        });
    }
}
