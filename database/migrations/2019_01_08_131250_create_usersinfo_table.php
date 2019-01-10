<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usersinfo', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('fullname');
            $table->string('username');
            $table->string('password');
            $table->string('email');
            $table->string('address');
            $table->string('birthday');
            $table->unsignedInteger('is_admin');
            $table->foreign('is_admin')->references('id_admin')->on('checkadmin');
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
        Schema::dropIfExists('usersinfo');
    }
}
