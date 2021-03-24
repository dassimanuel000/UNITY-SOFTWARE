<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Upgrade extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('upgrade', function (Blueprint $table) {
            $table->bigIncrements('idupgrade');
            $table->double('identifiant_upgrade');
            $table->string('matricule_upgrade');
            $table->json('question');
            $table->string('objectif');
            $table->string('importance');
            $table->string('examinateur');
            $table->string('autre');
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
