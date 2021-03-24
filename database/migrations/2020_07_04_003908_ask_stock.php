<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AskStock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //ask_stock
        Schema::create('ask_stock', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('id_demandeur');
            $table->string('agence');
            $table->string('type');
            $table->string('ask');
            $table->string('text_ask');
            $table->string('importance');
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
