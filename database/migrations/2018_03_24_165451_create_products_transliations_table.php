<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTransliationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_transliations', function (Blueprint $table) {
            $table->integer('for_id', 10)->unsigned()->nullable(false);
            $table->string('name', 255)->nullable(false);
            $table->text('description')->nullable(false);
            $table->string('price', 20)->nullable(false);
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
        Schema::dropIfExists('products_transliations');
    }
}
