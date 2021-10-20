<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayamentMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('payament_methods', function (Blueprint $table) {
            $table->id();
            $table->enum('mode',['sandbox','live']);
            $table->text('paypal_sandbox_client_id')->nullable();
            $table->text('paypal_sandbox_secret')->nullable();
            $table->text('paypal_live_client_id')->nullable();
            $table->text('paypal_live_secret')->nullable();

            $table->text('stripe_key')->nullable();
            $table->text('stripe_secrit')->nullable();
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
        Schema::dropIfExists('payament_methods');
    }
}
