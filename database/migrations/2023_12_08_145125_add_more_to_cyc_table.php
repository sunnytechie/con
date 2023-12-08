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
        Schema::table('cycs', function (Blueprint $table) {
            $table->date('cyc_date')->after('cyc_title')->nullable();
            $table->text('cyc_thumbnail')->after('cyc_date')->nullable();
            $table->string('cyc_name')->after('cyc_thumbnail')->nullable();
            $table->text('cyc_name_title')->after('cyc_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cycs', function (Blueprint $table) {
            //
        });
    }
};
