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
        Schema::create('blog_favarites', function (Blueprint $Table) {
            $Table->id();
            $Table->foreignId('blog_id')->constrained('blogs');
            $Table->foreignId('favorite_id')->constrained('favorites');

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
        Schema::dropIfExists('blog_favarites');
    }
};
