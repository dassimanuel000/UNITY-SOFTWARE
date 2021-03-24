<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FactureEmis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facture_emis', function (Blueprint $table) {
            $table->bigIncrements('idfacture_emis');
            $table->string('identifiantFacture');
            $table->string('nameClient');
            $table->decimal('idClient');
            $table->json('allProduct');
            $table->json('allQuantityCommande');
            $table->json('allPriceUnitaire');
            $table->json('allPriceTotal');
            $table->double('remise');
            $table->double('totalCommande');
            $table->double('totalFacture');
            $table->longText('autre');
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
        Schema::dropIfExists('facture_emis');
    }
}
