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
        Schema::table('bcpsubcategories', function (Blueprint $table) {
            $table->longText('content')->nullable()->after('title')->comment('content of the bcp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bcpsubcategories', function (Blueprint $table) {
            //
        });
    }
};
