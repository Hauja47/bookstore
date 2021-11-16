<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnGoodsReceitDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('return_goods_receit_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('return_goods_receit_id')->constrained('return_goods_receits');
            $table->foreignId('bill_detail_id')->constrained('bill_details');
            $table->foreignId('product_id')->constrained('products');
            $table->integer('number');
            $table->integer('cost');
            $table->integer('total');
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
        Schema::dropIfExists('return_goods_receit_details');
    }
}
