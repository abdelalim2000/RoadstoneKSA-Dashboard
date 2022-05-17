<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToContactsTable extends Migration
{
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->unsignedBigInteger('contact_type_id')->nullable();
            $table->foreign('contact_type_id', 'contact_type_fk_6613473')->references('id')->on('contact_types');
        });
    }
}
