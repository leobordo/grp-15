<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon', function (Blueprint $table) {
            $table->string('CodiceCoupon')->primary();
            $table->string('Utente');
            $table->foreign('Utente')->references('NomeUtente')->on('utentelivello1')->onDelete('cascade');
            $table->string('Promozione');
            $table->foreign('Promozione')->references('NomePromo')->on('promozioni')->onDelete('cascade');
            $table->date('Data');
            $table->time('Ora');
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
        Schema::dropIfExists('coupon');
    }
}

