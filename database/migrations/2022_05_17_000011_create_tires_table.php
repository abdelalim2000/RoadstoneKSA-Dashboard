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
            $table->string('slug')->index();
            $table->string('video_link')->nullable();
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
            $table->unique('slug');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tires');
    }
}
