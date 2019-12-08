<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEstadoCivilToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personas', function (Blueprint $table) {
            $table->unsignedBigInteger('departamento_id')->nullable();
            $table->unsignedBigInteger('municipio_id')->nullable();
            $table->unsignedBigInteger('estado_civil_id')->nullable();
            $table->unsignedBigInteger('cui')->nullable();

            $table->foreign('departamento_id')->references('id')->on('departamentos')->onDelete('set null');
            $table->foreign('municipio_id')->references('id')->on('municipios')->onDelete('set null');
            $table->foreign('estado_civil_id')->references('id')->on('estado_civil')->onDelete('set null');
            $table->foreign('cui')->references('cui')->on('cui')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personas', function (Blueprint $table) {
            $table->dropForeign(['departamento_id']);
            $table->dropForeign(['municipio_id']);
            $table->dropForeign(['estado_civil_id']);
            $table->dropForeign(['cui']);
        });
    }
}
