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
        Schema::create('assegnazione', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Operatore');
            $table->foreign('Operatore')->references('id')->on('utente')->onDelete('cascade');
            $table->unsignedBigInteger('Azienda');
            $table->foreign('Azienda')->references('id')->on('azienda')->onDelete('cascade');
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
        Schema::dropIfExists('assegnazione');
    }
};
