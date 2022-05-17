<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTireSizesTable extends Migration
{
    public function up()
    {
        Schema::table('tire_sizes', function (Blueprint $table) {
            $table->foreignId('tire_id')->nullable()->references('id')->on('tires');
        });
    }

    public function down()
    {
        Schema::table('tire_sizes', function (Blueprint $table) {
            $table->dropForeign('tire_id');
        });
    }
}
