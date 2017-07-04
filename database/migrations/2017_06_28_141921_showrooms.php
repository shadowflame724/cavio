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
            $table->string('country');
            $table->string('city');
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone2')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
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
