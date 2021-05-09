<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTblInwardSlip extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tbl_inward_slip', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('vendor_id');
            $table->integer('warehouse_id');
            $table->integer('total_amount');
            $table->integer('total_quanlity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Tbl_inward_slip');
    }
}
