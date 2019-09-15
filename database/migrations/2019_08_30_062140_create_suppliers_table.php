<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements('supplier_id');
            // $table->unsignedBigInteger('product_id');
            $table->string('name');
            $table->string('location');
        });

        for($i=0; $i<10; $i++){
            DB::table('suppliers')->insert(
                array(
                    // 'product_id' => $i+1,
                    'name' => 'Supplier '.$i,
                    'location' => 'Colombo '.$i,
                )
            );
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}