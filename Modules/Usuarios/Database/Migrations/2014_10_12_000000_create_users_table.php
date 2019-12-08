<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('genero')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->unsignedBigInteger('padre_id')->nullable();
            $table->unsignedBigInteger('madre_id')->nullable();
            $table->string('lugar_nacimiento')->nullable();
            $table->boolean('difunto')->default(0)->nullable();
            $table->date('fecha_defuncion')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamp('logged_at')->nullable();
            $table->timestamps();


            $table->foreign('padre_id')->references('id')->on('personas')->onDelete('set null');
            $table->foreign('madre_id')->references('id')->on('personas')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('personas',function(Blueprint $table)
        {
           $table->dropForeign(['padre_id']);
           $table->dropForeign(['madre_id']);
        });
        Schema::dropIfExists('personas');
    }
}
