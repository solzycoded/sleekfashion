<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('collection_id');
            $table->integer('order_id');
            $table->bigInteger('noofitems');
            $table->timestamps();
            $table->foreign('collection_id')->references('id')->on('collections')->cascadeOnUpdate()->cascadeOnDelete(); 
            $table->foreign('order_id')->references('id')->on('orders')->cascadeOnUpdate()->cascadeOnDelete(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
