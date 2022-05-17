<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTireTireDesignPivotTable extends Migration
{
    public function up()
    {
        Schema::create('tire_tire_design', function (Blueprint $table) {
            $table->unsignedBigInteger('tire_id');
            $table->foreign('tire_id', 'tire_id_fk_6613389')->references('id')->on('tires')->onDelete('cascade');
            $table->unsignedBigInteger('tire_design_id');
            $table->foreign('tire_design_id', 'tire_design_id_fk_6613389')->references('id')->on('tire_designs')->onDelete('cascade');
        });
    }
}
