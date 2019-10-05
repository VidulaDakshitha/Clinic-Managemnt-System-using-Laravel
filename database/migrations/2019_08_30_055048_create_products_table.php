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
            //$table->unsignedBigInteger('prescription_id');
            // $table->unsignedBigInteger('supplier_id');
            $table->string('name');
            $table->float('selling_price');
            $table->unsignedInteger('quantity');
            $table->string('potency');
            $table->string('expiry_date');
            $table->string('type');
            $table->string('brand');
            $table->text('description');
            $table->string('image');
        });

            DB::table('products')->insert(
                array(
                    // 'supplier_id' => $i+1,
                    'name' => 'Ache Nil Drops',
                    //'prescription_id' => ($i+1),
                    'selling_price' => 650.00,
                    'quantity' => 25,
                    'potency' => 0,
                    'expiry_date' => 2021-10-15,
                    'type' => 'medical',
                    'brand'=>'S.B.L',
                    'description'=>'S.B.L Ache Drops',
                    'image' => 'Ache-Nil-SBL_1570261063.png'
                )
            );

            DB::table('products')->insert(
                array(
                    // 'supplier_id' => $i+1,
                    'name' => 'Adel 18',
                    //'prescription_id' => ($i+1),
                    'selling_price' => 800.00,
                    'quantity' => 15,
                    'potency' => 18,
                    'expiry_date' => 2020-10-10,
                    'type' => 'medical',
                    'brand'=>'Glucorect',
                    'description'=>'Glucorect Adel-18 Remedy Drops',
                    'image' => 'adel-18-glucorect_1570261177.jpg'
                )
            );

            DB::table('products')->insert(
                array(
                    // 'supplier_id' => $i+1,
                    'name' => 'A.Montana-Fortified',
                    //'prescription_id' => ($i+1),
                    'selling_price' => 1500.00,
                    'quantity' => 20,
                    'potency' => 0,
                    'expiry_date' => 2019-10-05,
                    'type' => 'general',
                    'brand'=>'S.B.L',
                    'description'=>'Arnica Montana Fortified Hair Oil for hair growth',
                    'image' => 'Arnica-montana-Fortified_1570261236.jpg'
                )
            );

            DB::table('products')->insert(
                array(
                    // 'supplier_id' => $i+1,
                    'name' => 'A.Montana Oil',
                    //'prescription_id' => ($i+1),
                    'selling_price' => 1000.00,
                    'quantity' => 20,
                    'potency' => 0,
                    'expiry_date' => 2019-10-06,
                    'type' => 'general',
                    'brand'=>'S.B.L',
                    'description'=>'Arnica Montana Hair Oil for dandruff',
                    'image' => 'Arnica-Montana-Oil_1570261280.jpg'
                )
            );

            DB::table('products')->insert(
                array(
                    // 'supplier_id' => $i+1,
                    'name' => 'A.Montana Shampoo',
                    //'prescription_id' => ($i+1),
                    'selling_price' => 850.00,
                    'quantity' => 20,
                    'potency' => 0,
                    'expiry_date' => 2022-10-06,
                    'type' => 'general',
                    'brand'=>'S.B.L',
                    'description'=>'S.B.L Arnica Montana Shampoo',
                    'image' => 'Arnica-Montana-Shampoo_1570261372.jpg'
                )
            );

            DB::table('products')->insert(
                array(
                    // 'supplier_id' => $i+1,
                    'name' => 'Arnica Oinement',
                    //'prescription_id' => ($i+1),
                    'selling_price' => 400.00,
                    'quantity' => 15,
                    'potency' => 0,
                    'expiry_date' => 2025-01-22,
                    'type' => 'general',
                    'brand'=>'S.B.L',
                    'description'=>'S.B.L Arnica Oinement for skin care',
                    'image' => 'Arnica-Oinement_1570261467.jpg'
                )
            );

            DB::table('products')->insert(
                array(
                    // 'supplier_id' => $i+1,
                    'name' => 'Haemoglow',
                    //'prescription_id' => ($i+1),
                    'selling_price' => 2500.00,
                    'quantity' => 30,
                    'potency' => 0,
                    'expiry_date' => 2022-10-15,
                    'type' => 'medical',
                    'brand'=>'S.B.L',
                    'description'=>'S.B.L Blood Purifier Remedy',
                    'image' => 'Haemoglow_1570273704.jpg'
                )
            );

            DB::table('products')->insert(
                array(
                    // 'supplier_id' => $i+1,
                    'name' => 'R10 Remedy',
                    //'prescription_id' => ($i+1),
                    'selling_price' => 675.00,
                    'quantity' => 15,
                    'potency' => 10,
                    'expiry_date' => 2019-10-06,
                    'type' => 'medical',
                    'brand'=>'Dr.Reckeweg',
                    'description'=>'Dr.Reckeweg R-10 Remedy',
                    'image' => 'R10-dr.Reckeweg_1570273778.jpg'
                )
            );

            DB::table('products')->insert(
                array(
                    // 'supplier_id' => $i+1,
                    'name' => 'R16 Remedy',
                    //'prescription_id' => ($i+1),
                    'selling_price' => 800.00,
                    'quantity' => 10,
                    'potency' => 16,
                    'expiry_date' => 2019-10-12,
                    'type' => 'medical',
                    'brand'=>'Dr.Reckeweg',
                    'description'=>'Dr.Reckeweg R-16 Remedy',
                    'image' => 'R16-dr.Reckeweg_1570273831.jpg'
                )
            );

            DB::table('products')->insert(
                array(
                    // 'supplier_id' => $i+1,
                    'name' => 'Drops NO-5',
                    //'prescription_id' => ($i+1),
                    'selling_price' => 775.00,
                    'quantity' => 22,
                    'potency' => 50,
                    'expiry_date' => 2025-02-21,
                    'type' => 'medical',
                    'brand'=>'S.B.L',
                    'description'=>'Drops-No5 for Cervical pain',
                    'image' => 'Drops-No5_1570273956.jpg'
                )
            );

            DB::table('products')->insert(
                array(
                    // 'supplier_id' => $i+1,
                    'name' => 'Cal.Oinement',
                    //'prescription_id' => ($i+1),
                    'selling_price' => 660.00,
                    'quantity' => 12,
                    'potency' => 0,
                    'expiry_date' => 2021-11-12,
                    'type' => 'general',
                    'brand'=>'S.B.L',
                    'description'=>'Calendula Oinement for skin',
                    'image' => 'Calendula-Oinement_1570274052.jpg'
                )
            );

            
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