<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            // $table->unsignedBigInteger('supplier_id');
            $table->string('name');
            $table->float('selling_price');
            $table->unsignedInteger('quantity');
            $table->string('potency');
            $table->string('expiry_date');
            $table->string('type');
            $table->string('brand');
            $table->text('description');
            $table->text('product_image');
        });

        for($i=0; $i<10; $i++){
            DB::table('products')->insert(
                array(
                    // 'supplier_id' => $i+1,
                    'name' => 'Product '.$i,
                    'selling_price' => $i*100,
                    'quantity' => $i*1000,
                    'potency' => 'Potent',
                    'expiry_date' => now(),
                    'type' => 'Product Type '.$i,
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
        Schema::dropIfExists('products');
    }
}
