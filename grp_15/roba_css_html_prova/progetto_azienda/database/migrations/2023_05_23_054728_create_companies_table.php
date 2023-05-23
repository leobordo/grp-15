<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome');
            $table->string('tipologia');
            $table->string('localizzazione');
            $table->string('ragioneSociale');
            $table->text('descrizione')->nullable();


        });
    }


    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
