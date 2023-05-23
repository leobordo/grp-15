<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up()
    {
        Schema::create('consumers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('password');
            $table->string('nome');
            $table->string('cognome');
            $table->string('email');
            $table->string('telefono');
            $table->char('genere');
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('consumers');
    }
};
