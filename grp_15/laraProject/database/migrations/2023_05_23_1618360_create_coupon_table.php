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
            $table->id();
            $table->string('CodiceCoupon');
            $table->unsignedBigInteger('Utente');
            $table->foreign('Utente')->references('id')->on('utente')->onDelete('cascade');
            $table->unsignedBigInteger('Promozione');
            $table->foreign('Promozione')->references('id')->on('promozioni')->onDelete('cascade');
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

