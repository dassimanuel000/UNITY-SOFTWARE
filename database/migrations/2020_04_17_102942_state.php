<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class State extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('state', function (Blueprint $table) {
            $table->bigIncrements('idstate');
            $table->string('stateFACTURE');
            $table->double('stateCOMMANDE');
            $table->double('stateCOPIE');
            $table->boolean('stateAUTRE');
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
        Schema::dropIfExists('state');
    }
}
