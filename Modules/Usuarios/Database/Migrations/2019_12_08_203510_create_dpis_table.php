<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDpisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cui', function (Blueprint $table) {
            $table->unsignedBigInteger('cui');
            $table->unsignedBigInteger('no_correlativo');
            $table->integer('digito_validatorio');
            $table->unsignedBigInteger('departamento_id');
            $table->unsignedBigInteger('municipio_id');
            $table->timestamps();


            $table->foreign('departamento_id')->references('id')->on('departamentos')->onDelete('cascade');
            $table->foreign('municipio_id')->references('id')->on('municipios')->onDelete('cascade');
            $table->primary('cui');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('cui', function (Blueprint $table) {
        //     $table->dropForeign(['departamento_id']);
        //     $table->dropForeign(['municipio_id']);
        // });
        Schema::dropIfExists('cui');
    }
}
