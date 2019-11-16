<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('type_user')->unsigned();
            $table->integer('program_id')->unsigned()->nullable();
            $table->integer('sede');
            $table->string('password');
            //permisos de usuario
            $table->boolean('activeUser')->nullable();
            $table->boolean('PermissionAdmin')->nullable();
            //clave foranea
            $table->foreign('type_user')->references('id')->on('roles');
            $table->foreign('program_id')->references('id')->on('programs');
            
            $table->rememberToken();
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
        Schema::dropIfExists('users');
        //$table->dropForeign('type_user');
    }
}
