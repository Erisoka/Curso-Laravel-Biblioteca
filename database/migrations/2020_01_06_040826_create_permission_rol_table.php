<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionRolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_rol', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('permission_id')->unsigned();
            $table->bigInteger('rol_id')->unsigned();

            $table->timestamps();

            $table->foreign('permission_id', 'fk_permission_role_permissions')->references('id')->on('permissions')
                ->onDelete('restrict') 
                ->onUpdate('restrict');

            $table->foreign('rol_id', 'fk_permission_role_roles')->references('id')->on('rol')
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
        Schema::dropIfExists('permission_rol');
    }
}
