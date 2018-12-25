<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCareerdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('careerdetails', function (Blueprint $table) {
           $table->increments('id');
           $table->unsignedInteger('user_id');
           $table->string('image');
           $table->string('location');
           $table->string('phone_number');
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
        Schema::dropIfExists('careerdetails');
    }
}
