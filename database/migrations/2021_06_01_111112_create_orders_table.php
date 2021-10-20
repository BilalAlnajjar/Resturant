<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->string('ip');
            $table->unsignedBigInteger('address_id');
            $table->unsignedBigInteger('customer_id');
            $table->enum('payment_type',['paypal','stripe','cash'])->nullable();
            $table->enum('time',['now','later']);
            $table->string('timeLater')->nullable();
            $table->integer('quantity')->default(1);
            $table->enum('status',["pending",'processing','shipping','completed','declined'])->default('pending');
            $table->double('price')->default(0);
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')->cascadeOnDelete();
            $table->foreign('address_id')->references('id')->on('addresses')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
