<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCarModelsTable extends Migration
{
    public function up()
    {
        Schema::table('car_models', function (Blueprint $table) {
            $table->foreignId('maker_id')->nullable()->references('id')->on('makers');
            $table->unique(['name', 'maker_id']);
        });
    }

    public function down()
    {
        Schema::table('car_models', function (Blueprint $table) {
            $table->dropForeign('maker_id');
        });
    }
}
