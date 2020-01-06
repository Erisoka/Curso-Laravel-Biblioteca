<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_user', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('book_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();

            $table->date('fecha_prestamo');
            $table->string('prestado_a', 100);
            $table->boolean('estado');
            $table->date('fecha_devolucion')->nullable();

            $table->timestamps();

            $table->foreign('book_id', 'fk_book_user_books')->references('id')->on('books')
                ->onDelete('restrict') 
                ->onUpdate('restrict');

            $table->foreign('user_id', 'fk_book_user_users')->references('id')->on('users')
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
        Schema::dropIfExists('book_user');
    }
}
