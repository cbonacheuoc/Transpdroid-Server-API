<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingStatesHistoriesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('shipping_states_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shipping_id')->unsigned();
            $table->integer('state_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('shipping_id')->references('id')->on('shippings');
            $table->foreign('state_id')->references('id')->on('states');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('shipping_states_history');
    }

}
