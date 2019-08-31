<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_payments', function (Blueprint $table) {
            $table->bigIncrements('pay_id');
            $table->unsignedBigInteger('patient_id');
            $table->string('date');
            $table->float('amount');
            $table->unsignedBigInteger('order_id');
            $table->string('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_payments');
    }
}