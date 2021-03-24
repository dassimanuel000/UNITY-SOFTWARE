<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facture', function (Blueprint $table) {
            $table->bigIncrements('idFacture');
            $table->string('nameProduct');
            $table->double('idClient');
            $table->decimal('quantityProduct');
            $table->double('priceMinProduct');
            $table->double('priceMaxProduct');
            $table->double('taxeProduct');
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
        Schema::dropIfExists('facture');
    }
}
