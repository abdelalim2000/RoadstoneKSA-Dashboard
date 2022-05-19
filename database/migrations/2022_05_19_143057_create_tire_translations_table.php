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
        Schema::create('tire_translations', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('locale')->index();
            $table->longText('short_description');
            $table->longText('seo_keywords')->nullable();
            $table->longText('seo_description')->nullable();
            $table->longText('description')->nullable();
            $table->foreignId('tire_id')->references('id')->on('tires')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->unique(['locale', 'tire_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tire_translations');
    }
};
