<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateLichsuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lichsu', function (Blueprint $table) {
            $table->bigInteger('id_sp')->after('id_user');
            $table->string('trangthai')->after('id_sp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lichsu', function (Blueprint $table) {
            //
        });
    }
}
