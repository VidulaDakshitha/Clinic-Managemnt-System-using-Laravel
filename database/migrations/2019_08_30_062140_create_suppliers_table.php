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
            $table->string('name');
            $table->string('location');
        });

        DB::table('suppliers')->insert(
            array(
                'name' => 'New England Pharmacy',
                'location' => '652 Michael\'s Rd Colombo',
            )
        );
        DB::table('suppliers')->insert(
            array(
                'name' => 'Oceana Pharmacy',
                'location' => '854 St Jude\'s Rd Negombo',
            )
        );
        DB::table('suppliers')->insert(
            array(
                'name' => 'Wellawatta Pharmaceutical Suppliers',
                'location' => '211 St. Mary\'s Rd Wellawatta, Colombo',
            )
        );
        DB::table('suppliers')->insert(
            array(
                'name' => 'Khomba Soap Producers',
                'location' => '2145 Main Road Kandy',
            )
        );
        DB::table('suppliers')->insert(
            array(
                'name' => 'Aloe Vera Gel Company',
                'location' => '124 Rex Dias Rd Chilaw',
            )
        );
        DB::table('suppliers')->insert(
            array(
                'name' => 'Pharmaceutical Importers',
                'location' => '111 Kochchikade Colombo',
            )
        );
        DB::table('suppliers')->insert(
            array(
                'name' => 'Major Bandage Producers',
                'location' => '632 St. Luke\'s Rd Katunayake',
            )
        );
        DB::table('suppliers')->insert(
            array(
                'name' => 'Roger Medical Supplies',
                'location' => '485 Main Rd Borella',
            )
        );
        DB::table('suppliers')->insert(
            array(
                'name' => 'Marsh Drug Store',
                'location' => '652 Michael\'s Rd Galle',
            )
        );
        DB::table('suppliers')->insert(
            array(
                'name' => 'Keystone Pharmacy',
                'location' => '546 William\'s Rd Negombo',
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
        Schema::dropIfExists('suppliers');
    }
}