<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_histories', function (Blueprint $table) {
            $table->id();
            $table->string('food_name');
            $table->biginteger('food_quantity');
            $table->string('unit');
            $table->boolean('latest_flag')->default(true);
            $table->unsignedBigInteger('animal_information_id');
            $table->unsignedBigInteger('version');
            $table->dateTime('start_at')->nullable();
            $table->dateTime('end_at')->nullable();
            $table->timestamps();
            $table->foreign('animal_information_id')->references('id')->on('animal_informations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_histories');
    }
}
