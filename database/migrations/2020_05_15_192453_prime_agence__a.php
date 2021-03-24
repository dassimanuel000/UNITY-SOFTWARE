<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PrimeAgenceA extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('prime_agence_A', function (Blueprint $table) {
            $table->bigIncrements('idprime');
            $table->string('matriculeEmp');
            $table->double('idEmp');
            $table->string('nameEmp');
            $table->double('salaireBaseEmp');
            $table->double('primeLoyer');
            $table->double('primeTransport');
            $table->double('primePerformance');
            $table->double('primeHeureSub');
            $table->double('autreprime');
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
