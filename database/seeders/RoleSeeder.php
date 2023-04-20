<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Role::create([
        'name' => 'superAdministrateur',
         ]);
        
        Role::create([
        'name' => 'administrateur',
         ]);

        Role::create([
        'name'=>'moderateur',
         ]);

        Role::create([
        'name'=>'utilisateur',
         ]);


    }
}
