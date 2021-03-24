<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StockUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('stock_update', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('id_mere');
            $table->string('referent');
            $table->string('title');
            $table->decimal('quantity_before');
            $table->decimal('quantity_after');
            $table->double('price_min_before', 25, 5);
            $table->double('price_max_before', 25, 5);
            $table->double('price_min_after', 25, 5);
            $table->double('price_max_after', 25, 5);
            $table->mediumText('image')->nullable();
            $table->double('price_achat_before', 25, 5);
            $table->double('price_achat_after', 25, 5);
            $table->date('last_update');
            $table->json('update');
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
