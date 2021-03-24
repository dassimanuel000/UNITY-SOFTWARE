<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Horaire extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('horaire', function (Blueprint $table) {
            $table->bigIncrements('idhoraire');
            $table->string('matriculeEmp');
            $table->string('nameEmp');
            $table->double('idEmp');
            $table->string('year');
            $table->string('month');
            $table->date('date');
            $table->double('hourstart');
            $table->double('minutestart');
            $table->double('hourstop');
            $table->double('minutestop');
            $table->string('otherhoraire');
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
