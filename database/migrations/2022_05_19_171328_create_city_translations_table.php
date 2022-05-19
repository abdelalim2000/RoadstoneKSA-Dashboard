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
        Schema::create('city_translations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('locale')->index();
            $table->longText('seo_keywords')->nullable();
            $table->longText('seo_description')->nullable();
            $table->foreignId('city_id')->references('id')->on('cities')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->unique(['locale', 'city_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('city_translations');
    }
};
