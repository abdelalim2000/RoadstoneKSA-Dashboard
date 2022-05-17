<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->longText('address');
            $table->string('phone');
            $table->string('working_hour')->nullable();
            $table->longText('map');
            $table->boolean('active')->default(0)->nullable();
            $table->timestamps();
        });
    }
}
