<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarouselTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carousel_translation', function (Blueprint $table) {
          $table->integer('position')->unsigned()->nullable(false)->default(1);
          $table->integer('for_id',10)->unsigned()->nullable(false);
          $table->string('image', 255)->nullable(false);
          $table->string('locale', 5)->nullable(false);
          $table->increments('id');
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
        Schema::dropIfExists('carousel_translation');
    }
}
