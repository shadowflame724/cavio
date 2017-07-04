<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ZonesCollections extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection_zones', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('zone_id')->nullable();
            $table->tinyInteger('collection_id');
            $table->string('title')->nullable();
            $table->string('title_ru')->nullable();
            $table->string('title_it')->nullable();

            $table->string('slug')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('collection_zones');
    }
}
