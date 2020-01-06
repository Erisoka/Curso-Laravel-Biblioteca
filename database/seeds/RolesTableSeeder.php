<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RolesTableSeeder extends Seeder
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
            DB::table('roles')->insert([
                'nombre' => $role, 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }

    }
}
