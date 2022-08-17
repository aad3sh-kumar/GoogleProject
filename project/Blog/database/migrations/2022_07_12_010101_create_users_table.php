<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->string('email');
            $table->string('username');
            $table->string('password');
            $table->longText('about')->nullable();
            $table->longText('skills')->nullable();
            $table->string('country')->nullable();
            $table->longText('education')->nullable();
            $table->BigInteger('blogs')->default('0');
            $table->BigInteger('followers')->default('0');
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
        Schema::dropIfExists('users');
    }
}
