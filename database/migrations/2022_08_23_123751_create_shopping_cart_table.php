<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingcartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_cart', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('collection_id');
            $table->integer('user_id');
            $table->bigInteger('noofitems');
            $table->timestamps();
            $table->foreign('collection_id')->references('id')->on('collections')->cascadeOnUpdate()->cascadeOnDelete(); 
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete(); 
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shopping_cart');
    }
}
