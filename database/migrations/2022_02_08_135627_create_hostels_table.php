<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHostelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hostels', function (Blueprint $table) {
            $table->id();
            $table->string('hostelName');
//            $table->unsignedBigInteger('userId');
            $table->foreignId('userId')->constrained('users');
            $table->string('about');
            $table->string('location');
            $table->string('district');
            $table->string('features');
            $table->string('hostelStatus');
            $table->string('searchFilters');
            $table->string('latitude');
            $table->string('longitude');

//            $table->string('facilities');
            //rating
            $table->string('primaryImg');
            $table->string('additionalImages');

//            $table->foreign('userId')->references('id')->on('users');

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
        Schema::dropIfExists('hostels');
    }
}
