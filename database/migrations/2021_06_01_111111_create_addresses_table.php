<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surename');
            $table->unsignedBigInteger('customer_id');
            $table->string('city');
            $table->string('street')->nullable();
            $table->string('mobile');
            $table->string('email');
            $table->text('postcode')->nullable();
            $table->text('company')->nullable();
            $table->text('address1')->nullable();
            $table->text('address2')->nullable();
            $table->text('town')->nullable();
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
