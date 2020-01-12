<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuRolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_rol', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('menu_id')->unsigned();
            $table->bigInteger('rol_id')->unsigned();

            $table->foreign('menu_id', 'fk_menu_role_menus')->references('id')->on('menus')
                ->onDelete('cascade') 
                ->onUpdate('restrict');

            $table->foreign('rol_id', 'fk_menu_role_roles')->references('id')->on('rol')
                ->onDelete('restrict') 
                ->onUpdate('restrict');

            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';

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
        Schema::dropIfExists('menu_rol');
    }
}
