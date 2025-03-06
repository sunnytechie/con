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
            $table->decimal('daily_dynamite_euro', 10, 2)->nullable();
            $table->decimal('daily_fountain_euro', 10, 2)->nullable();
            $table->decimal('bible_study_euro', 10, 2)->nullable();
            $table->decimal('cyc_euro', 10, 2)->nullable();
            $table->decimal('cyc_calender_euro', 10, 2)->nullable();
            $table->decimal('bcp_euro', 10, 2)->nullable();
            $table->decimal('hymnal_euro', 10, 2)->nullable();
            $table->decimal('daily_dynamite_pounds', 10, 2)->nullable();
            $table->decimal('daily_fountain_pounds', 10, 2)->nullable();
            $table->decimal('bible_study_pounds', 10, 2)->nullable();
            $table->decimal('cyc_pounds', 10, 2)->nullable();
            $table->decimal('cyc_calender_pounds', 10, 2)->nullable();
            $table->decimal('bcp_pounds', 10, 2)->nullable();
            $table->decimal('hymnal_pounds', 10, 2)->nullable();
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
