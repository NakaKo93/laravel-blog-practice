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
        Schema::create('blogs', function (Blueprint $Table) {
            $Table->id();
            $Table->string('title', 20);
            $Table->string('explanation', 255);

            $Table->timestamp('create_at')->userCurrent()->nullable();
            $Table->timestamp('update_at')->userCurrent()->userCurrentOnUpdate()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
};
