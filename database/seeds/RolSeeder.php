<?php

use App\Models\Admin\Rol;
//use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'administrador',
            'editor',
            'supervisor'
        ];

        foreach($roles as $key => $role){
            Rol::create([
                'nombre' => $role
            ]);
            /*
            DB::table('rol')->insert([
                'nombre' => $role, 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
            */
        }
    }
}
