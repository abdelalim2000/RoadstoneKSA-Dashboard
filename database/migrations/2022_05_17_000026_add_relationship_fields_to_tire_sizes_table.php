<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTireSizesTable extends Migration
{
    public function up()
    {
        Schema::table('tire_sizes', function (Blueprint $table) {
            $table->unsignedBigInteger('tire_id')->nullable();
            $table->foreign('tire_id', 'tire_fk_6620961')->references('id')->on('tires');
        });
    }
}
