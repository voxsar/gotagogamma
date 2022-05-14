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
            $table->unsignedBigInteger("cost_building_class")->index();
            $table->foreign("cost_building_class")->references('cost_building_class')->on("buildings");
            $table->integer("level");
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
