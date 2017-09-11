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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('twitter_id');
            $table->string('name');
            $table->string('handle');
            $table->string('mail')->nullable();
            $table->string('avatar');
            $table->string('cinsiyet')->nullable();
            $table->string('telefon')->nullable();
            $table->string('token');
            $table->string('tokenSecret');
            $table->integer('cocuk_eklenebilir')->default(1);
            $table->integer('devam')->default(1);
            $table->rememberToken();
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
