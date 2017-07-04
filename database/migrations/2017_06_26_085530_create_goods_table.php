<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('category_id');
            $table->tinyInteger('collection_id');
            $table->tinyInteger('zone_id');
            $table->tinyInteger('finish_tissue_id');
            $table->string('code')->nullable();
            $table->string('slug')->nullable();
            $table->string('name')->nullable();
            $table->string('name_ru')->nullable();
            $table->string('name_it')->nullable();
            $table->string('dimensions');
            $table->text('description')->nullable();
            $table->text('description_ru')->nullable();
            $table->text('description_it')->nullable();


//            $table->foreign('category_id')
//                ->references('id')
//                ->on('categories')
//                ->onUpdate('cascade')
//                ->onDelete('cascade');
//
//            $table->foreign('collection_id')
//                ->references('id')
//                ->on('collections')
//                ->onUpdate('cascade')
//                ->onDelete('cascade');
//
//            $table->foreign('zone_id')
//                ->references('id')
//                ->on('zones')
//                ->onUpdate('cascade')
//                ->onDelete('cascade');
//
//            $table->engine = 'InnoDB';
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
        Schema::dropIfExists('goods');
    }
}
