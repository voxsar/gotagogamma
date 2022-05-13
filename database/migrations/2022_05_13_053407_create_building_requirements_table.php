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
        Schema::create('building_requirements', function (Blueprint $table) {
            $table->id();
            $table->foreignId("building_id");
            $table->foreignId("cost_building_id")->on("buildings");
            $table->integer("level");
            $table->integer("min");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('building_requirements');
    }
};
