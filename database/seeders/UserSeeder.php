<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
      $superAdministrateur = User::create([
               'name' => 'Team',
                'firstname' => 'affranchie',
                'sexe' => 'male',
                'day' => '24',
                'month' => '11',
                'year' => '1996',
                'phone' => '01000000',
                'email' => 'info@affranchie.com',
                'password' => Hash::make('12345678'),
      ]);


        $administrateur = User::create([
               'name' => 'Social',
                'firstname' => 'affranchie',
                'sexe' => 'male',
                'day' => '24',
                'month' => '11',
                'year' => '1996',
                'phone' => '02020202',
                'email' => 'social@affranchie.com',
                'password' => Hash::make('12345678'),
      ]);

     //
     $moderateur = User::create([
               'name' => 'moderateur',
                'firstname' => 'moderateur',
                'sexe' => 'male',
                'day' => '24',
                'month' => '11',
                'year' => '1996',
                'phone' => '03030303',
                'email' => 'moderateur@gmail.com',
                'password' => Hash::make('12345678'),
      ]);
  
  //
       $utilisateur = User::create([
               'name' => 'Test',
                'firstname' => 'affranchie',
                'sexe' => 'male',
                'day' => '24',
                'month' => '11',
                'year' => '1996',
                'phone' => '04040404',
                'email' => 'utilisateur@gmail.com',
                'password' => Hash::make('12345678'),
      ]);

 // Roles 
       $superAdminRole = Role::where('name','superAdministrateur')->first();
       $adminRole = Role::where('name','administrateur')->first();
       $moderateurRole = Role::where('name','moderateur')->first();
       $utilisateurRole = Role::where('name','utilisateur')->first();
   //Attach
       $superAdministrateur->roles()->attach($superAdminRole);
       $administrateur->roles()->attach($adminRole);
       $moderateur->roles()->attach($moderateurRole);
       $utilisateur->roles()->attach($utilisateurRole);

    }
}
