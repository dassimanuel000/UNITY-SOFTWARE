<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CashOutB extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('cash_out_b', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('id_mere');
            $table->double('id_client');
            $table->string('name_client');
            $table->string('id_facture');
            $table->string('referent');
            $table->string('title');
            $table->string('type');
            $table->decimal('quantity');
            $table->double('price_int', 25, 2);
            $table->double('total_int');
            $table->json('facture');
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
