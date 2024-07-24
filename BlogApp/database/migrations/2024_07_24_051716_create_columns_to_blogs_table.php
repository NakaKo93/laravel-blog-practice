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
        Schema::table('blogs', function (Blueprint $table) {
            $table->dateTime('published_date')->nullable()->after('explanation');
            $table->boolean('published_flg')->default(false)->after('published_date');
            $table->boolean('delete_flg')->default(false)->after('published_flg');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn('published_date');
            $table->dropColumn('published_flg');
            $table->dropColumn('delete_flg');
        });
    }
};
