<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::dropIfExists('users');
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id');
            $table->integer('user_role_id');
            $table->string('name');
            $table->string('email', 191)->unique();
            $table->string('phone', 10)->nullable()->unique();
            $table->string('password', 30)->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('country_id')->references('id')->on('countries')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('user_role_id')->references('id')->on('user_roles')->cascadeOnUpdate()->cascadeOnDelete(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}