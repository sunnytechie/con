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
        Schema::create('bibleinoneyears', function (Blueprint $table) {
            $table->id();
            $table->string('date')->comment('Date format: 2021-10-03');
            $table->string('day')->comment('Day format: 1');
            $table->string('month')->comment('Month format: October')->nullable();
            $table->string('year')->default(date('Y'))->comment('Year format: 2021');
            $table->string('first_psalm')->comment('Book format: Psalm 1');
            $table->string('second_psalm')->comment('Book format: Psalm 2');
            $table->string('old_testament')->comment('Book format: Genesis 1');
            $table->string('new_testament')->comment('Book format: Matthew 1');
            $table->string('gospel')->comment('Book format: Matthew 1');

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
        Schema::dropIfExists('bibleinoneyears');
    }
};
