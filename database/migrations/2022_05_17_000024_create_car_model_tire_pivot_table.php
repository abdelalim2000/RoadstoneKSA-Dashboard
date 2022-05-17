<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarModelTirePivotTable extends Migration
{
    public function up()
    {
        Schema::create('car_model_tire', function (Blueprint $table) {
            $table->foreignId('tire_id')->references('id')->on('tires')->onDelete('cascade');
            $table->foreignId('car_model_id')->references('id')->on('car_models')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('car_model_tire');
    }
}
