<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_type_translations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('locale')->index();
            $table->foreignId('contact_type_id')->references('id')->on('contact_types')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->unique(['locale', 'contact_type_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_type_translations');
    }
};
