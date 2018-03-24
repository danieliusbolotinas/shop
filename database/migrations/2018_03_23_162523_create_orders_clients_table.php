<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_clients', function (Blueprint $table) {
            $table->integer('for_order', 11)->nullable(false);
            $table->string('first_name', 100)->nullable(false);
            $table->string('last_name', 100)->nullable(false);
            $table->string('email', 100)->nullable(false);
            $table->string('phone', 30)->nullable(false);
            $table->text('adress', 30)->nullable(false);
            $table->string('city', 20)->nullable(false);
            $table->string('post_code', 10)->nullable(false);
            $table->text('notes')->nullable(false);
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
        Schema::dropIfExists('orders_clients');
    }
}
