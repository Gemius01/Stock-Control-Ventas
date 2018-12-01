<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
        	'name' 		=> 'Root',
        	'slug' 		=> 'root',
        	'special' 	=> 'all-access'
        ]);
        Role::create([
            'name'      => 'Administrador',
            'slug'      => 'administrador',
        ]);
        Role::create([
            'name'      => 'Vendedor',
            'slug'      => 'vendedor',
        ]);
        
    }
}
