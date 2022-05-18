<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tire_feature_translations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('locale')->index();
            $table->foreignId('tire_feature_id')->references('id')->on('tire_features')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->unique(['locale', 'tire_feature_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tire_feature_translations');
    }
};
