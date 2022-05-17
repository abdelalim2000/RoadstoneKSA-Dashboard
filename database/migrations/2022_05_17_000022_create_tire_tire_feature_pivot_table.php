<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTireTireFeaturePivotTable extends Migration
{
    public function up()
    {
        Schema::create('tire_tire_feature', function (Blueprint $table) {
            $table->unsignedBigInteger('tire_id');
            $table->foreign('tire_id', 'tire_id_fk_6613388')->references('id')->on('tires')->onDelete('cascade');
            $table->unsignedBigInteger('tire_feature_id');
            $table->foreign('tire_feature_id', 'tire_feature_id_fk_6613388')->references('id')->on('tire_features')->onDelete('cascade');
        });
    }
}
