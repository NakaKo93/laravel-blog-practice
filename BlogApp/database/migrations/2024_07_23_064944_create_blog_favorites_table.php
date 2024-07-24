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
        Schema::create('blog_favorites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blog_id');
            $table->foreign('blog_id')->references('blog_id')->on('blogs')->cascadeOnDelete();
            $table->unsignedBigInteger('favorite_id');
            $table->foreign('favorite_id')->references('favorite_id')->on('favorites')->cascadeOnDelete();

            $table->timestamp('create_at')->userCurrent()->nullable();
            $table->timestamp('update_at')->userCurrent()->userCurrentOnUpdate()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_favorites');
    }
};
