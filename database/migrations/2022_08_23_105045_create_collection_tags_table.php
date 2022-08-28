<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('collection_id');
            $table->integer('tag_id');
            $table->timestamps();
            $table->foreign('collection_id')->references('id')->on('collections')->cascadeOnUpdate()->cascadeOnDelete(); 
            $table->foreign('tag_id')->references('id')->on('tags')->cascadeOnUpdate()->cascadeOnDelete(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collection_tags');
    }
}
