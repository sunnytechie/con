<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('donations', function (Blueprint $table) {
            // Update province_id with data from province
            DB::table('donations')->update(['province_id' => DB::raw('province')]);

            // Update diocese_id with data from diocese
            DB::table('donations')->update(['diocese_id' => DB::raw('diocese')]);

            // You may want to drop the old columns if needed
            //$table->dropColumn(['province', 'diocese']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('donations', function (Blueprint $table) {
            //
        });
    }
};
