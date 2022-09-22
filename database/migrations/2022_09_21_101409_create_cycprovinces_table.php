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
        Schema::create('cycprovinces', function (Blueprint $table) {
            $table->id();
            $table->text('province_name')->nullable();
            $table->text('province_id')->nullable();
            $table->text('diocese')->nullable();
            $table->text('inagurated')->nullable();
            $table->text('img_url')->nullable();
            $table->text('rev_name')->nullable();
            $table->text('rev_title')->nullable();
            $table->text('court')->nullable();
            $table->text('address')->nullable();
            $table->text('po_box')->nullable();
            $table->string('tel')->nullable();
            $table->string('email')->nullable();
            $table->string('email_2')->nullable();
            $table->string('website')->nullable();
            $table->text('synod_name')->nullable();
            $table->text('synod_title')->nullable();
            $table->text('synod_address')->nullable();
            $table->string('synod_email')->nullable();
            $table->string('synod_tel')->nullable();
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
        Schema::dropIfExists('cycprovinces');
    }
};
