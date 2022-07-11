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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('thumbnail');
            $table->string('video')->nullable();
            $table->string('audio')->nullable();
            $table->string('url')->nullable();
            $table->text('description');
            $table->string('category_id');
            $table->string('subcategory_id')->nullable();
            $table->string('duration')->nullable();
            $table->string('source')->nullable();
            $table->string('video_type')->default('mp4_video');
            $table->boolean('can_preview')->default(true);
            $table->boolean('is_free')->default(true);
            $table->string('type')->nullable();
            $table->string('likes_count')->nullable();
            $table->string('dislikes_count')->nullable();
            $table->string('views_count')->nullable();
            $table->string('preview_duration')->nullable();
            $table->boolean('downloadable')->default(false);
            $table->boolean('notification')->default(false);
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
        Schema::dropIfExists('media');
    }
};
