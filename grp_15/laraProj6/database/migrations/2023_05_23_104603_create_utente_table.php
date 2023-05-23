<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utente', function (Blueprint $table) {
            $table->id(); //il metodo id() setta già id come primary key
            $table->string('NomeUtente');
            $table->string('Password');
            $table->string('Nome');
            $table->string('cognome');
            $table->string('Email');
            $table->string('Telefono');
            $table->string('Genere');
            $table->integer('Livello');
            $table->integer('NumeroCouponTotali')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utente');
    }
};
