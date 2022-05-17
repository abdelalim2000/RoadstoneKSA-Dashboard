<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiresTable extends Migration
{
    public function up()
    {
        Schema::create('tires', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->longText('short_description');
            $table->longText('seo_keywords')->nullable();
            $table->longText('seo_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('video_link')->nullable();
            $table->string('cta_link')->nullable();
            $table->string('cta_text')->nullable();
            $table->float('dry_performance', 2, 1)->nullable();
            $table->float('wet_performance', 2, 1)->nullable();
            $table->float('rolling_resistance', 2, 1)->nullable();
            $table->float('comfort_noise', 2, 1)->nullable();
            $table->float('wear', 2, 1)->nullable();
            $table->float('snow', 2, 1)->nullable();
            $table->float('fuel_consumption', 2, 1)->nullable();
            $table->float('durability', 2, 1)->nullable();
            $table->float('wet_handling', 2, 1)->nullable();
            $table->float('wet_grip', 2, 1)->nullable();
            $table->float('aquaplaning', 2, 1)->nullable();
            $table->float('ice', 2, 1)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tires');
    }
}
