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

        //Fountain = 1
        //Bible Study = 2
        //Daily dynamite = 3
        
    public function up()
    {
        Schema::create('studies', function (Blueprint $table) {
            $table->id();
            $table->boolean('type')->default(1);
            $table->string('study_type_name')->default('Fountain');
            $table->text('study_name')->nullable();
            $table->date('study_date')->nullable();
            $table->date('head_date')->nullable();
            $table->text('theme')->nullable();
            $table->text('sub_theme')->nullable();
            $table->text('topic')->nullable();
            $table->text('study_text')->nullable();
            $table->text('study_title')->nullable();
            $table->text('study_content')->nullable();
            $table->text('aims')->nullable();
            $table->text('introduction')->nullable();
            $table->text('study_guide')->nullable();
            $table->text('conclusion')->nullable();
            $table->text('food_for_thought')->nullable();
            $table->text('memory_verse')->nullable();
            $table->text('verse_content')->nullable();
            $table->text('anchor_verse_number')->nullable();
            $table->text('anchor_verse_text')->nullable();
            $table->text('anchor_verse_contents')->nullable();
            $table->text('prayer')->nullable();
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
        Schema::dropIfExists('studies');
    }
};
