<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdditionSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addition_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('addition_category_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->double('price');
            $table->timestamps();

            $table->foreign('addition_category_id')->references('id')->on('addition_categories')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addition_sub_categories');
    }
}
