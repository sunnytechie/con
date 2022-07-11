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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->boolean('is_admin')->default(false);
            $table->string('role')->default('user')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('login_type')->default('email');
            $table->string('blocked')->default(0);
            $table->string('isDeleted')->default(0);
            $table->string('subscribed')->nullable();
            $table->string('subscribe_expiry_date')->nullable();
            $table->string('subscribe_plan')->nullable();
            $table->string('subscribe_token')->nullable();
            $table->string('sub_type')->nullable();
            $table->string('user_otp')->nullable();
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
        Schema::dropIfExists('users');
    }
};
