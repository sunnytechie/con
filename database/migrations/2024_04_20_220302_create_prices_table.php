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
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->string('daily_dynamite')->nullable();
            $table->string('daily_fountain')->nullable();
            $table->string('bible_study')->nullable();
            $table->string('cyc')->nullable();
            $table->string('cyc_calender')->nullable();
            $table->string('bcp')->nullable();
            $table->string('hymnal')->nullable();
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
        Schema::dropIfExists('prices');
    }
};
