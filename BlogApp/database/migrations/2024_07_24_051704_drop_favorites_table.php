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
        Schema::dropIfExists('favorites');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->id('favorite_id');

            $table->timestamp('create_at')->userCurrent()->nullable();
            $table->timestamp('update_at')->userCurrent()->userCurrentOnUpdate()->nullable();
        });
    }
};
