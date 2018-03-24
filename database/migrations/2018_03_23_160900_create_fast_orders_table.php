<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFastOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fast_orders', function (Blueprint $table) {
          $table->string('phone',50)->nullable(false);
          $table->string('names',100)->nullable(false);
          $table->timestamp('time_created')->nullable(false)->default();
          $table->tinyint('status', 4)->nullable(false)->default(0);
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
        Schema::dropIfExists('fast_orders');
    }
}
