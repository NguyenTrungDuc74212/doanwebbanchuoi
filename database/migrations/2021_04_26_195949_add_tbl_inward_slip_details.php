<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTblInwardSlipDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tbl_inward_slip_details', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('inward_slip_id');
            $table->integer('quantity');
            $table->integer('price_import');
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
        Schema::dropIfExists('Tbl_inward_slip_details');
    }
}
