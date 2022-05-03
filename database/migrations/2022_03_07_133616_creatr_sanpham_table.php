<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatrSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tensp');
            $table->string('giasp');
            $table->string('loaisp');
            $table->string('soluong');
            $table->string('thuonghieu');
            $table->integer('trangthaisp')->default(1)->comment = '1:sale 0:new';
            $table->string('giamgia');
            $table->string('anh');
            $table->string('mota');
            $table->integer('id_thuonghieu');
            $table->integer('id_loaisp');
            $table->integer('id_users');
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
        Schema::dropIfExists('sanpham');
    }
}
