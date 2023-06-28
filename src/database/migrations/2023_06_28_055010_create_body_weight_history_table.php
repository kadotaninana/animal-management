<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBodyWeightHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('body_weight_histories', function (Blueprint $table) {
            $table->id();
            $table->biginteger('body_weight');
            $table->string('unit');
            $table->boolean('latest_flag')->default(true);
            $table->unsignedBigInteger('animal_information_id');
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
        Schema::dropIfExists('body_weight_histories');
    }
}
