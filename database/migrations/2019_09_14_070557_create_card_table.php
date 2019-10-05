<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('patientID');
            $table->text('orderID');
            $table->bigInteger('cardNum');
            $table->text('bank');
            $table->integer('serialNum');
            $table->text('cardType');
            $table->timestamps();
        });

        DB::table('cards')->insert(
            array(
                
                'patientID' => '1',
                'orderID' => '10',
                'cardNum' => '1234123412341234',
                'bank' => 'HNB',
                'serialNum' => '123',
                'cardType' => 'VISA',
                
            )
        );

        DB::table('cards')->insert(
            array(
                
                'patientID' => '2',
                'orderID' => '12',
                'cardNum' => '1234123412341222',
                'bank' => 'Commercial',
                'serialNum' => '421',
                'cardType' => 'MASTER',
                
            )
        );

        DB::table('cards')->insert(
            array(
                
                'patientID' => '2',
                'orderID' => '11',
                'cardNum' => '1234123412341145',
                'bank' => 'Sampath',
                'serialNum' => '246',
                'cardType' => 'VISA',
                
            )
        );

        DB::table('cards')->insert(
            array(
                
                'patientID' => '1',
                'orderID' => '10',
                'cardNum' => '1234123412341234',
                'bank' => 'DFCC',
                'serialNum' => '478',
                'cardType' => 'VISA',
                
            )
        );

        DB::table('cards')->insert(
            array(
                
                'patientID' => '3',
                'orderID' => '13',
                'cardNum' => '1234123412341789',
                'bank' => 'NTB',
                'serialNum' => '216',
                'cardType' => 'VISA',
                
            )
        );

        DB::table('cards')->insert(
            array(
                
                'patientID' => '1',
                'orderID' => '17',
                'cardNum' => '1234123412347894',
                'bank' => 'NTB',
                'serialNum' => '123',
                'cardType' => 'MASTER',
                
            )
        );

        DB::table('cards')->insert(
            array(
                
                'patientID' => '8',
                'orderID' => '14',
                'cardNum' => '1234123412341896',
                'bank' => 'Commercial',
                'serialNum' => '143',
                'cardType' => 'VISA',
                
            )
        );

        DB::table('cards')->insert(
            array(
                
                'patientID' => '4',
                'orderID' => '18',
                'cardNum' => '2148123412341234',
                'bank' => 'HNB',
                'serialNum' => '123',
                'cardType' => 'MASTER',
                
            )
        );

        DB::table('cards')->insert(
            array(
                
                'patientID' => '1',
                'orderID' => '10',
                'cardNum' => '1234123412341234',
                'bank' => 'HNB',
                'serialNum' => '123',
                'cardType' => 'VISA',
                
            )
        );

        DB::table('cards')->insert(
            array(
                
                'patientID' => '7',
                'orderID' => '19',
                'cardNum' => '1234123412341234',
                'bank' => 'People',
                'serialNum' => '113',
                'cardType' => 'MASTER',
                
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
        Schema::dropIfExists('card');
    }
}
