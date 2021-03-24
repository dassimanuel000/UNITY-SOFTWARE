<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StockVenteB extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('stock_vente_B', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('id_mere');
            $table->string('referent');
            $table->string('title');
            $table->string('description');
            $table->string('category');
            $table->decimal('quantity');
            $table->double('price_min', 25, 5);
            $table->double('price_max', 25, 5);
            $table->decimal('alarm_stock');
            $table->mediumText('image')->nullable();
            $table->string('product_type');
            $table->string('provider');
            $table->double('tax');
            $table->double('price_achat', 25, 5);
            $table->json('update');
            $table->boolean('correct');
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
