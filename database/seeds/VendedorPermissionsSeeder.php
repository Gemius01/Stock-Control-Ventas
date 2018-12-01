<?php

use Illuminate\Database\Seeder;

class VendedorPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission_role')->insert([
            'permission_id' => 8,
            'role_id' => 3, //id rol vendedor
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => 11,
            'role_id' => 3, //id rol vendedor
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => 16,
            'role_id' => 3, //id rol vendedor
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => 17,
            'role_id' => 3, //id rol vendedor
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => 18,
            'role_id' => 3, //id rol vendedor
        ]);
        
        DB::table('permission_role')->insert([
            'permission_id' => 19,
            'role_id' => 3, //id rol vendedor
        ]);
    }
}
