<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utente', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('NomeUtente');
            $table->string('Password');
            $table->string('Nome');
            $table->string('cognome');
            $table->string('Email');
            $table->string('Telefono');
            $table->string('Genere');
            $table->integer('Livello');
            $table->integer('NumeroCouponTotali');
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
