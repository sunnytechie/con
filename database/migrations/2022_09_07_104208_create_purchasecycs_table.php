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
        Schema::create('purchasecycs', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('cyc_id');
            $table->string('cyc_title');
            $table->string('cyc_year');
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
        Schema::dropIfExists('purchasecycs');
    }
};
