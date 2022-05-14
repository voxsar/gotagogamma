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
        Schema::create('building_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId("building_id")->nullable()->on("buildings");
            $table->foreignId("user_id")->on("users");
            $table->integer("level");
            $table->string("lat");
            $table->string("lng");
            $table->integer("is_building")->default(0);
            $table->unique(['building_id', 'user_id'])->nullable();
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
        Schema::dropIfExists('building_users');
    }
};
