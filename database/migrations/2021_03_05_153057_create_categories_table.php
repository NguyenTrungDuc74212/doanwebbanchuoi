<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tbl_category_post', function (Blueprint $table) {
       $table->id();
       $table->string('name');
       $table->text('desc');
       $table->text('meta_title');
       $table->text('meta_keywords');
       $table->text('slug')->nullable();
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
      Schema::dropIfExists('tbl_category_post');
    }
  }
