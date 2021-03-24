<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmployeAgenceA extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('employe', function (Blueprint $table) {
            $table->bigIncrements('idEmp');
            $table->string('matricule');
            $table->string('nameEmp');
            $table->string('prenomEmp');
            $table->string('emailEmp');
            $table->string('telEmp');
            $table->string('adresseEmp');
            $table->string('agenceEmp');
            $table->string('sexeEmp');
            $table->date('ageEmp');
            $table->string('agence');
            $table->string('statutEmp');
            $table->string('posteEmp');
            $table->string('salaireBaseEmp');
            $table->string('typeEmp');
            $table->mediumText('image')->nullable();
            $table->string('initial_agence');
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
