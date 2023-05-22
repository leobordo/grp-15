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
            $table->string('NomePromo')->primary();
            $table->string('Azienda');
            $table->foreign('Azienda')->references('Nome')->on('azienda')->onDelete('cascade');
            $table->string('DescrizioneSconto');
            $table->float('PercentualeSconto');
            $table->date('Scadenza');
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

