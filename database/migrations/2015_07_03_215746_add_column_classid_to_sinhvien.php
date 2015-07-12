<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnClassidToSinhvien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //add column classid in exist table sinhvien
        Schema::table('sinhvien', function (Blueprint $table) {
            //
            $table->smallInteger('classid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sinhvien', function (Blueprint $table) {
            //
            $table->dropColumn('classid');
        });
    }
}
