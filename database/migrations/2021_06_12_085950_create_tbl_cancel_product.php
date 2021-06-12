<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCancelProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_cancel_product', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('cancel_date');
            $table->integer('warehouse_product_id');
            $table->integer('quantity_cancel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_cancel_product');
    }
}
