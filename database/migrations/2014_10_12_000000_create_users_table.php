<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('type');
            $table->rememberToken();
            $table->timestamps();
        });

        // adding dummy entries
        DB::table('users')->insert(
            array(
                'name' => 'Lakshan Perera',
                'email' => 'admin@admin.com',
                'password'=> bcrypt('admin'),
                'type' => 'admin',
            )
        );

        // supplier manager
        DB::table('users')->insert(
            array(
                'name' => 'Lakshan Perera',
                'email' => 'sup@sup.com',
                'password'=> bcrypt('sup'),
                'type' => 'supplier_manager',
            )
        );

        // inventory manager
        DB::table('users')->insert(
            array(
                'name' => 'P. Anoj',
                'email' => 'inv@inv.com',
                'password'=> bcrypt('inv'),
                'type' => 'inventory_manager',
            )
        );

        // inventory manager
        DB::table('users')->insert(
            array(
                'name' => 'Kevin Gomez',
                'email' => 'cash@cash.com',
                'password'=> bcrypt('cash'),
                'type' => 'cashier',
            )
        );

        // adding dummy entrie
        DB::table('users')->insert(
            array(
                'name' => 'Lakshan Perera',
                'email' => 'patient@patient.com',
                'password'=> bcrypt('patient'),
                'type' => 'patient',
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
        Schema::dropIfExists('users');
    }
}