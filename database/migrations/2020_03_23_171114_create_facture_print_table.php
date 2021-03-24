<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturePrintTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facture_print', function (Blueprint $table) {
            $table->bigIncrements('idfactureprint');
            $table->string('identifiantFacture');
            $table->string('nameClient');
            $table->decimal('idClient');
            $table->json('allProduct');
            $table->json('allQuantityCommande');
            $table->json('allQuantityRetire');
            $table->json('allPriceUnitaire');
            $table->json('allPriceTotal');
            $table->double('remise');
            $table->double('totalCommande');
            $table->double('totalLivre');
            $table->double('totalFacture');
            $table->double('update');
            $table->json('img_last_facture')->nullable();
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
        Schema::dropIfExists('facture_print');
    }
}
