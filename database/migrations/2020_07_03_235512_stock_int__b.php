<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StockIntB extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('stock_int_b', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('id_mere');
            $table->double('id_emp');
            $table->string('name_emp');
            $table->string('referent');
            $table->string('title');
            $table->decimal('quantity');
            $table->double('price_min', 25, 2);
            $table->double('price_max', 25, 2);
            $table->mediumText('image')->nullable();
            $table->double('price_achat', 25, 2);
            $table->double('total_int');
            $table->double('jour_int');
            $table->string('mois_int');
            $table->date('date_int');
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
