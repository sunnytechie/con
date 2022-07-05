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
        Schema::create('purchased_books', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('book_id');
            $table->string('price');
            $table->string('transaction_ref')->nullable();
            $table->string('payment_status')->nullable();
            $table->boolean('deleted')->default(false);

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
        Schema::dropIfExists('purchased_books');
    }
};
