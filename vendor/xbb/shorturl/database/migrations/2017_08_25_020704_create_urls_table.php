<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urls', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('url', 255);
            $table->string('hash', 10);
            $table->integer('count')->unsigned()->default(0);
            $table->timestamps();
            $table->unique('hash');
            $table->unique('url');
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
