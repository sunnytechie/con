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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('fcm_server_key')->nullable();
            $table->string('mail_username')->nullable();
            $table->string('mail_password')->nullable();
            $table->string('mail_smtp_host')->nullable();
            $table->string('mail_protocol')->nullable();
            $table->string('mail_port')->nullable();
            $table->string('facebook_page')->nullable();
            $table->string('youtube_page')->nullable();
            $table->string('twitter_page')->nullable();
            $table->string('instagram_page')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('ads_interval')->nullable();
            $table->string('website_url')->nullable();
            $table->text('image_one')->nullable();
            $table->text('image_two')->nullable();
            $table->text('image_three')->nullable();
            $table->text('image_four')->nullable();
            $table->text('image_five')->nullable();
            $table->text('image_six')->nullable();
            $table->text('image_seven')->nullable();
            $table->text('image_eight')->nullable();
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
        Schema::dropIfExists('settings');
    }
};
