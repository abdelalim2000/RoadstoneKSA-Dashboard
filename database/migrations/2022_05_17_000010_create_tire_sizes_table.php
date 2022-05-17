<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTireSizesTable extends Migration
{
    public function up()
    {
        Schema::create('tire_sizes', function (Blueprint $table) {
            $table->id();
            $table->integer('width');
            $table->integer('ratio');
            $table->integer('rim_diameter');
            $table->integer('load_index');
            $table->string('speed_rating');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tire_sizes');
    }
}
