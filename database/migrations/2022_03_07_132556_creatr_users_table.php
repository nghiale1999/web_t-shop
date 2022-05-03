<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatrUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('sdt')->after('matkhau')->nullable();
            $table->string('diachi')->after('sdt')->nullable();
            $table->string('anh')->after('diachi')->nullable();
            $table->string('id_quocgia')->after('anh')->nullable();
            $table->unsignedInteger('capdo')->after('remember_token')->default(1)->comment = '1:admin 0:member';
            
        });


        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
