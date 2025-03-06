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
        Schema::table('prices', function (Blueprint $table) {
            $table->decimal('daily_dynamite_usd', 10, 2)->nullable();
            $table->decimal('daily_fountain_usd', 10, 2)->nullable();
            $table->decimal('bible_study_usd', 10, 2)->nullable();
            $table->decimal('cyc_usd', 10, 2)->nullable();
            $table->decimal('cyc_calender_usd', 10, 2)->nullable();
            $table->decimal('bcp_usd', 10, 2)->nullable();
            $table->decimal('hymnal_usd', 10, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prices', function (Blueprint $table) {
            //
        });
    }
};
