<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('patientID');
            $table->text('paymentFor');
            $table->double('amount');
            $table->date('date');
            $table->timestamps('');
        });

        DB::table('payments')->insert(
            array(
                
                'patientID' => '1',
                'paymentFor' => 'Fee',
                'amount' => '1000',
                'date' => '2019-09-08',
                
            )
        );

        DB::table('payments')->insert(
            array(
                
                'patientID' => '2',
                'paymentFor' => 'Doctor Visit',
                'amount' => '3000',
                'date' => '2019-09-06',
                
            )
        );

        DB::table('payments')->insert(
            array(
                
                'patientID' => '4',
                'paymentFor' => 'Appointment',
                'amount' => '4000',
                'date' => '2019-09-08',
                
            )
        );

        DB::table('payments')->insert(
            array(
                
                'patientID' => '1',
                'paymentFor' => 'Consume item',
                'amount' => '2000',
                'date' => '2019-09-07',
                
            )
        );

        DB::table('payments')->insert(
            array(
                
                'patientID' => '1',
                'paymentFor' => 'Fee',
                'amount' => '1500',
                'date' => '2019-09-04',
                
            )
        );

        DB::table('payments')->insert(
            array(
                
                'patientID' => '9',
                'paymentFor' => 'Appointment',
                'amount' => '7000',
                'date' => '2019-09-01',
                
            )
        );

        DB::table('payments')->insert(
            array(
                
                'patientID' => '2',
                'paymentFor' => 'Balance',
                'amount' => '4500',
                'date' => '2019-09-07',
                
            )
        );

        DB::table('payments')->insert(
            array(
                
                'patientID' => '1',
                'paymentFor' => 'Doctor Visit',
                'amount' => '3000',
                'date' => '2019-09-06',
                
            )
        );

        DB::table('payments')->insert(
            array(
                
                'patientID' => '3',
                'paymentFor' => 'Fee',
                'amount' => '2000',
                'date' => '2019-09-08',
                
            )
        );

        DB::table('payments')->insert(
            array(
                
                'patientID' => '8',
                'paymentFor' => 'Consume Item',
                'amount' => '3000',
                'date' => '2019-09-06',
                
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
        Schema::dropIfExists('payment');
    }
}
