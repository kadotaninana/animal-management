<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outpatient_histories', function (Blueprint $table) {
            $table->id();
            $table->text('memo');
            $table->text('hospital_name');
            $table->boolean('latest_flag')->default(true);
            $table->unsignedBigInteger('animal_information_id');
            $table->unsignedBigInteger('version');
            $table->dateTime('start_at')->nullable();
            $table->dateTime('end_at')->nullable();
            $table->timestamps();
            $table->foreign('animal_information_id')->references('id')->on('animal_informations')->onDelete('cascade');
        });
        Schema::create('medicine_histories', function (Blueprint $table) {
            $table->id();
            $table->string('medicine_name');
            $table->integer('how_often');
            $table->string('when');
            $table->biginteger('medicine_quantity');
            $table->string('unit');
            $table->text('memo');
            $table->unsignedBigInteger('version');
            $table->unsignedBigInteger('outpatient_history_id')->nullable();
            $table->boolean('latest_flag')->default(true);
            $table->unsignedBigInteger('animal_information_id');
            $table->dateTime('start_at')->nullable();
            $table->dateTime('end_at')->nullable();
            $table->timestamps();
            $table->foreign('animal_information_id')->references('id')->on('animal_informations')->onDelete('cascade');
            $table->foreign('outpatient_history_id')->references('id')->on('outpatient_histories')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outpatient_histories');
        Schema::dropIfExists('medicine_histories');
    }
}
