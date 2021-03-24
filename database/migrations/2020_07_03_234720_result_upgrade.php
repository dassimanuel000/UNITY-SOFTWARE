<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ResultUpgrade extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('result_upgrade', function (Blueprint $table) {
            $table->bigIncrements('idresult_upgrade');
            $table->double('identifiant_result_upgrade');
            $table->string('matricule_result_upgrade');
            $table->json('question');
            $table->string('objectif');
            $table->string('importance');
            $table->string('examinateur');
            $table->double('id_emp');
            $table->string('name_emp');
            $table->string('matricule_emp');
            $table->json('note');
            $table->json('note_final');
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
