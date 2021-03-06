<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('roomName');
            $table->unsignedBigInteger('roomType');
            $table->string('about');
            $table->integer('price');
            $table->string('roomStatus');
//            $table->string('facilities');
            //hostel foreign key
            //rating
            $table->string('primaryImg');
            $table->string('additionalImages');
            $table->foreignId('hostelId')->constrained('hostels');
            $table->foreign('roomType')->references('id')->on('roomType')->onDelete('cascade');

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
        Schema::dropIfExists('rooms');
    }
}
