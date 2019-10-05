<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->bigIncrements('doctor_id');
            $table->string('fullname');
            $table->string('nic');
            $table->string('type');
            $table->unique('nic');
            //$table->primary('doctor_id');
        });

        // adding dummy entries
        DB::table('doctors')->insert(
            array(
                'fullname' => 'DR.Shantha Kumar',
                'nic' => '199207810318',
                'type' => 'Asthma Surgeon',
            )
        );


        DB::table('doctors')->insert(
            array(
                'fullname' => 'DR A.K PROBHODANA RANAWEERA',
                'nic' => '199207810317',
                'type' => 'Asthma Surgeon',
            )
        );

        DB::table('doctors')->insert(
            array(
                'fullname' => 'DR A.M. DEEPAL K. ATTANAYAKE',
                'nic' => '199207810316',
                'type' => 'Ear Infections Surgeon',
            )
        );

        DB::table('doctors')->insert(
            array(
                'fullname' => 'DR(MRS) A.R.J.P. NIYAS',
                'nic' => '199207810315',
                'type' => 'Cardio Surgeon',
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
        Schema::dropIfExists('doctors');
    }
}