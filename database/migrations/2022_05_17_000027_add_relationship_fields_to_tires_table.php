<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTiresTable extends Migration
{
    public function up()
    {
        Schema::table('tires', function (Blueprint $table) {
            $table->foreignId('car_type_id')->nullable()->references('id')->on('car_types');
        });
    }

    public function down()
    {
        Schema::table('tires', function (Blueprint $table) {
            $table->dropForeign('car_type_id');
        });
    }
}
