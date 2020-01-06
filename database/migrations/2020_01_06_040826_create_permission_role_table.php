<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_role', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('permission_id')->unsigned();
            $table->bigInteger('role_id')->unsigned();

            $table->timestamps();

            $table->foreign('permission_id', 'fk_permission_role_permissions')->references('id')->on('permissions')
                ->onDelete('restrict') 
                ->onUpdate('restrict');

            $table->foreign('role_id', 'fk_permission_role_roles')->references('id')->on('roles')
                ->onDelete('restrict') 
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permission_role');
    }
}
