<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMakersTable extends Migration
{
    public function up()
    {
        Schema::create('makers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->boolean('searchable')->default(0)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('makers');
    }
}
