<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLichsuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lichsu', function (Blueprint $table) {
            $table->id();
            $table->string('tensp');
            $table->integer('soluong');   
            $table->string('gia');
            $table->bigInteger('id_user');
            $table->string('tennguoinhan');
            $table->string('diachi');
            $table->string('email');
            $table->string('sdt');
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
        Schema::dropIfExists('lichsu');
    }
}
