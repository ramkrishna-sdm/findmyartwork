<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->integer('artwork_id')->nullable();
            $table->string('payment_id')->nullable();
            $table->text('delivery_address')->nullable();
            $table->string('status')->nullable();
            $table->enum('shipping_status',['delivered','pending'])->default('pending');
            $table->longtext('paypal_response')->nullable();
            $table->longtext('artwork_info')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
