<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarModelTirePivotTable extends Migration
{
    public function up()
    {
        Schema::create('car_model_tire', function (Blueprint $table) {
            $table->unsignedBigInteger('tire_id');
            $table->foreign('tire_id', 'tire_id_fk_6613390')->references('id')->on('tires')->onDelete('cascade');
            $table->unsignedBigInteger('car_model_id');
            $table->foreign('car_model_id', 'car_model_id_fk_6613390')->references('id')->on('car_models')->onDelete('cascade');
        });
    }
}
