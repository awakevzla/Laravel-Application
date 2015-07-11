<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::dropIfExists('FarmAdmins');
        Schema::dropIfExists('Farms');
        Schema::dropIfExists('Addresses');

        Schema::create('Addresses', function (Blueprint $table){
            $table->increments('id');
            $table->string('country', 50);
            $table->string('state', 50);
            $table->string('city', 50);
            $table->mediumInteger('street_number');
            $table->string('street_name', 50);
            $table->string('postal', 15);
            $table->timestamps();
        });

        Schema::create('Farms', function (Blueprint $table){
            $table->increments('id');
            $table->string('name', 50);
            $table->string('subdomain', 50)->unique();
            $table->integer('address_id')->unsigned();
            $table->string('phone', 50)->nullable();
            $table->string('email', 50)->unique();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('address_id')->references('id')->on('Addresses');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        //
    }
}
