<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
          $table->string('image', 255)->default(NULL);
          $table->integer('folder', 10)->unsigned()->nullable(false);
          // $table->timestamp('created_at')->nullable(false)->default('created_at');
          // $table->timestamp('updated_at')->nullable(false)->default(NULL);
          $table->integer('category_id', 10)->unsigned()->nullable(false);
          $table->integer('quantity', 10)->unsigned()->nullable(false)->default(0);
          $table->string('url', 255)->nullable(false);
          $table->string('link_to', 255)->nullable(false);
          $table->integer('order_position', 10)->unsigned()->nullable(false);
          $table->integer('procurements', 10)->unsigned()->nullable(false)->default(0);
          $table->string('tags', 255)->nullable(false);
          // $table->tinyint('hidden', 1)->nullable(false)->default(0);
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
        Schema::dropIfExists('products');
    }
}
