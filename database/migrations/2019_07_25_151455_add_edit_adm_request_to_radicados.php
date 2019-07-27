<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEditAdmRequestToRadicados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('radicados', function (Blueprint $table) {
            $table->string('editAdmRequest')->nullable()->after('respuesta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('radicados', function (Blueprint $table) {
            $table->dropColumn('editAdmRequest');
        });
    }
}
