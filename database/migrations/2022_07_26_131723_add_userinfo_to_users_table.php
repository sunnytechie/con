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
        Schema::table('users', function (Blueprint $table) {
            $table->text('avatar')->nullable();
            $table->text('cover_photo')->nullable();
            $table->string('gender')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('phone')->nullable();
            $table->text('about_me')->nullable();
            $table->text('location')->nullable();
            $table->text('qualification')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkdln')->nullable();
            $table->text('notify_token')->nullable();
            $table->string('show_dateofbirth')->default(false);
            $table->string('show_phone')->default(false);
            $table->string('notify_follows')->default(true);
            $table->string('notify_comments')->default(true);
            $table->string('notify_likes')->default(true);
            $table->string('activated')->default(true);
            $table->string('online_status')->default(true);
            $table->string('last_seen_date')->default(now());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
