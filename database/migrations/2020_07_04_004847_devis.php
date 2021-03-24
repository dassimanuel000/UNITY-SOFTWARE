<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Devis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devis', function (Blueprint $table) {
            $table->bigIncrements('id_devis');
            $table->string('agence');
            $table->string('identifiantDevis');
            $table->string('nameClient');
            $table->decimal('idClient');
            $table->json('allProduct');
            $table->json('allQuantityCommande');
            $table->json('allPriceUnitaire');
            $table->json('allPriceTotal');
            $table->double('remise');
            $table->double('totalFacture');
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
        //
    }
}
