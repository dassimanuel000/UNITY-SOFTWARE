<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StockOutA extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('stock_out_a', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('id_mere');
            $table->double('id_emp');
            $table->string('name_emp');
            $table->double('id_client');
            $table->string('name_client');
            $table->string('id_facture');
            $table->string('referent');
            $table->string('title');
            $table->decimal('quantity');
            $table->double('price_min', 25, 2);
            $table->double('price_max', 25, 2);
            $table->mediumText('image')->nullable();
            $table->double('price_achat', 25, 2);
            $table->double('total_out');
            $table->double('jour_out');
            $table->string('mois_out');
            $table->date('date_out');
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
