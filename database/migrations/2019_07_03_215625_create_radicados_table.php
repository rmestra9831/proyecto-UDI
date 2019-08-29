<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateRadicadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('radicados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('atention')->nullable();
            $table->string('year')->nullable();
            $table->string('name',100);
            $table->string('last_name',100);
            $table->string('fechradic_id')->nullable();
            $table->integer('program_id')->unsigned()->nullable();
            $table->integer('sendTo_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('respon_id')->unsigned()->nullable();
            $table->integer('motivo_id')->unsigned()->nullable();
            $table->string('asunto')->nullable();
            $table->string('origen_cel',14)->nullable();
            $table->string('origen_correo')->nullable();
            $table->text('observaciones');
            $table->text('obs')->nullable();
            $table->text('respuesta')->nullable();
            $table->string('editAdmRequest')->nullable();

            //---
            $table->date('fech_start_radic')->nullable();
            $table->string('time_start_radic')->nullable();
            //---   
            $table->date('fech_send_dir')->nullable();
            $table->string('time_send_dir')->nullable();
            //---
            $table->date('fech_recive_dir')->nullable();
            $table->string('time_recive_dir')->nullable();
            //---
            $table->date('fech_recive_radic')->nullable();
            $table->string('time_recive_radic')->nullable();
            //---
            $table->date('fech_notifi_end')->nullable();
            $table->string('time_notifi_end')->nullable();
            //---
            $table->date('fech_delivered')->nullable();
            $table->string('time_delivered')->nullable();
            //---
            $table->string('slug')->unique()->nullable();
            $table->integer('status_id')->nullable();

            $table->timestamps();
            //agregando las claves foraneas
            $table->foreign('program_id')->references('id')->on('programs');
            $table->foreign('sendTo_id')->references('id')->on('programs');
            $table->foreign('motivo_id')->references('id')->on('motivos');
            //$table->foreign('fechradic_id')->references('id')->on('fech_radics');

        });
        //DB::statement('ALTER TABLE radicados CHANGE id_radicado id_radicado INT(4) UNSIGNED ZEROFILL NOT NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('radicados');
    }
}
