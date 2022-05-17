<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTiresTable extends Migration
{
    public function up()
    {
        Schema::table('tires', function (Blueprint $table) {
            $table->unsignedBigInteger('car_type_id')->nullable();
            $table->foreign('car_type_id', 'car_type_fk_6613391')->references('id')->on('car_types');
        });
    }
}
