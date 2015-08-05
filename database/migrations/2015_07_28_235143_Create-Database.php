<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('Business');
        Schema::dropIfExists('Address');

        Schema::create('Address', function (Blueprint $table){
            $table->increments('id');
            $table->string('country', 50);
            $table->string('state', 50);
            $table->string('city', 50);
            $table->mediumInteger('street_number');
            $table->string('street_name', 50);
            $table->string('postal', 15);
            $table->timestamps();
        });

        Schema::create('Business', function (Blueprint $table){
            $table->increments('id');
            $table->string('name', 50);
            $table->string('subdomain', 50)->unique();
            $table->integer('address_id')->unsigned();
            $table->string('phone', 50)->nullable();
            $table->string('email', 50)->unique();
            $table->tinyInteger('theme')->default(1);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('address_id')->references('id')->on('Address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
