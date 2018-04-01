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
          $table->increments('id');
          $table->string('image', 255)->default(NULL);
          // $table->integer('folder', 10);
          // $table->timestamp('created_at')->->default('created_at');
          // $table->timestamp('updated_at')->->default(NULL);
          // $table->integer('category_id', 10);
          // $table->integer('quantity', 10)->default(0);
          $table->string('url', 255);
          $table->string('link_to', 255);
          // $table->integer('order_position', 10);
          // $table->integer('procurements', 10)->default(0);
          $table->string('tags', 255);
          // $table->tinyint('hidden', 1)->->default(0);
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
