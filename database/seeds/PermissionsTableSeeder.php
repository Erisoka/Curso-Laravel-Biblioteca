<?php

use App\Models\Admin\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(Permission::class, 50)->create();
        DB::table('permissions')->insert([
            'nombre' => 'Prestar Libros',
            'slug' => 'prestar-libros',
            'created_at' => '2020-01-13 22:12:23',
            'updated_at' => '2020-01-13 22:12:23',
        ]);
        DB::table('permissions')->insert([
            'nombre' => 'Crear Libros',
            'slug' => 'crear-libros',
            'created_at' => '2020-01-13 22:12:23',
            'updated_at' => '2020-01-13 22:12:23',
        ]);
        DB::table('permissions')->insert([
            'nombre' => 'Editar Libros',
            'slug' => 'editar-libros',
            'created_at' => '2020-01-13 22:12:23',
            'updated_at' => '2020-01-13 22:12:23',
        ]);
        DB::table('permissions')->insert([
            'nombre' => 'Listar Libros',
            'slug' => 'listar-libros',
            'created_at' => '2020-01-13 22:12:23',
            'updated_at' => '2020-01-13 22:12:23',
        ]);

    }
}
