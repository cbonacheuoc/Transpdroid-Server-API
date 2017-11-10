<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('shippings', function(Blueprint $table) {
            $table->increments('id');
            $table->string('code', 100);
            $table->string('contact_person', 255);
            $table->string('address', 255);
            $table->string('cp', 45);
            $table->string('city', 255);
            $table->string('state', 255);
            $table->string('country', 255);
            $table->string('telephone', 255);
            $table->string('email', 255);
            $table->integer('number');
            $table->string('weight', 255);
            $table->string('size', 255);
            $table->boolean('fragile');
            $table->timestamp('delivery_date')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('states');

            $table->string('image', 255)->nullable();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('shippings');
    }

}
