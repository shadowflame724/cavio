<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Showrooms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('showrooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('country', 35);
            $table->string('city', 35);
            $table->string('name', 191)->nullable();
            $table->string('address', 191)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('phone2', 20)->nullable();
            $table->string('fax', 20)->nullable();
            $table->string('email', 35)->nullable();
            $table->float('lat')->nullable();
            $table->float('lng')->nullable();
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
        Schema::dropIfExists('showrooms');
    }
}
