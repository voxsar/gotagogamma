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
        Schema::create('market_resources', function (Blueprint $table) {
            $table->foreignId("resource_id")->on("resources");
            $table->foreignId("market_id")->on("markets");
            $table->foreignId("user_id")->on("users");
            $table->integer("amount");
            $table->primary(['market_id', 'resource_id', 'user_id']);
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
        Schema::dropIfExists('market_resources');
    }
};
