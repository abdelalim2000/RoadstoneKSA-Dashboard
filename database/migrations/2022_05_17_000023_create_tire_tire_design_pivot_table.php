<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTireTireDesignPivotTable extends Migration
{
    public function up()
    {
        Schema::create('tire_tire_design', function (Blueprint $table) {
            $table->foreignId('tire_id')->references('id')->on('tires')->onDelete('cascade');
            $table->foreignId('tire_design_id')->references('id')->on('tire_designs')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tire_tire_design');
    }
}
