<?php

use App\Models\Seguridad\Usuario;
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
        $usuario = Usuario::create([
            'usuario' => 'Omicron',
            'nombre' => 'Leo',
            'email' => 'leonidas.asprilla@outlook.com',
            'password' => 'omicron',
        ]);
        $usuario->roles()->sync(1);
        /*
        DB::table('users')->insert([
            'usuario' => 'Omicron',
            'nombre' => 'Leo',
            'email' => 'leonidas.asprilla@outlook.com',
            'password' => Hash::make('omicron'),
        ]);

        DB::table('users')->insert([
            'usuario' => 'rat',
            'nombre' => 'Roosvel',
            'email' => 'rat.roosvelt@prueba.com',
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
        */
    }
}
