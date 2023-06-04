<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_address_id');
            $table->unsignedBigInteger('user_payment_id');
            $table->decimal('subtotal', 8, 2);
            $table->decimal('discount_amount', 8, 2)->default(0.00);
            $table->decimal('tax', 8, 2)->default(0.00);
            $table->decimal('total', 8, 2);
            $table->tinyInteger('status')->default('0');
            $table->timestamps();

            $table->foreign('user_address_id')->references('id')->on('user_addresses')->onDelete('cascade');
            // $table->foreign('user_payment_id')->references('id')->on('user_payments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
};
