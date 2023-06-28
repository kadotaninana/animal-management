<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalinformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal_informations', function (Blueprint $table) {
            $table->id();
            $table->string('animal_name');
            $table->date('birthday');
            $table->integer('age');
            $table->date('came');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->boolean('is_death')->default(false);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animal_informations');
    }
}
