<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClientAgenceA extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('client_agence_A', function (Blueprint $table) {
            $table->bigIncrements('id_client');
            $table->double('identifiantFacture');
            $table->string('name_client');
            $table->string('adress_client');
            $table->string('telephone_client');
            $table->string('entreprise_client');
            $table->string('sexe_client');
            $table->bigInteger('account_client');
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
