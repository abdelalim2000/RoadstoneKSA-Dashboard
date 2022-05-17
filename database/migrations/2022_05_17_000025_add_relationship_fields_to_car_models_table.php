<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCarModelsTable extends Migration
{
    public function up()
    {
        Schema::table('car_models', function (Blueprint $table) {
            $table->unsignedBigInteger('maker_id')->nullable();
            $table->foreign('maker_id', 'maker_fk_6613257')->references('id')->on('makers');
        });
    }
}
