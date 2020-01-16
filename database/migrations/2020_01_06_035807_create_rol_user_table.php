<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rol_user', function (Blueprint $table) {
            //$table->bigIncrements('id');

            $table->bigInteger('rol_id')->unsigned();
            $table->bigInteger('usuario_id')->unsigned();
            //$table->boolean('estado');

            //$table->timestamps();

            $table->foreign('rol_id', 'fk_rol_user_roles')->references('id')->on('rol')
                ->onDelete('restrict') 
                ->onUpdate('restrict');

            $table->foreign('usuario_id', 'fk_rol_user_users')->references('id')->on('users')
                ->onDelete('restrict') 
                ->onUpdate('restrict');

            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rol_user');
    }
}
