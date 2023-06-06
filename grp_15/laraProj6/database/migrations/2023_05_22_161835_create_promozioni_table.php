<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromozioniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promozioni', function (Blueprint $table) {
            $table->id();
            $table->string('NomePromo');
            $table->unsignedBigInteger('Azienda');
            $table->foreign('Azienda')->references('id')->on('azienda')->onDelete('cascade');
            $table->string('DescrizioneSconto');
            $table->string('Tipologia');
            $table->float('PercentualeSconto')->nullable();
            $table->date('Scadenza');
            $table->string('Immagine')->nullable();
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
        Schema::dropIfExists('promozioni');
    }
}

