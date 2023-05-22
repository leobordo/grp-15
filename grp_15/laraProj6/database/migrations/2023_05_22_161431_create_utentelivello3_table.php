<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtentelivello3Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utentelivello3', function (Blueprint $table) {
            $table->string('NomeUtente')->primary();
            $table->string('Password');
            $table->string('Nome');
            $table->string('cognome');
            $table->string('Email');
            $table->string('Telefono');
            $table->string('Genere');
            $table->rememberToken();
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
        Schema::dropIfExists('utentelivello3');
    }
}
