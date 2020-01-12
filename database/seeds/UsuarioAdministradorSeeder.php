<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioAdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'usuario' => 'Omicron',
            'nombre' => 'Leo',
            'password' => Hash::make('omicron'),
        ]);

        DB::table('users')->insert([
            'usuario' => 'rat',
            'nombre' => 'Roosvel',
            'password' => Hash::make('12345'),
        ]);

        DB::table('rol_user')->insert([
            'rol_id' => 1,
            'usuario_id' => 1,
            'estado' => 1
        ]);

        DB::table('rol_user')->insert([
            'rol_id' => 2,
            'usuario_id' => 2,
            'estado' => 1
        ]);
    }
}
