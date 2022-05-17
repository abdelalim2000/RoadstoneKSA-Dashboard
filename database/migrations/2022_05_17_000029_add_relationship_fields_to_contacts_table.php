<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToContactsTable extends Migration
{
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->foreignId('contact_type_id')->nullable()->references('id')->on('contact_types');
        });
    }

    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropForeign('contact_type_id');
        });
    }
}
