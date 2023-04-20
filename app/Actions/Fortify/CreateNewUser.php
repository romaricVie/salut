<?php

namespace App\Actions\Fortify;

use App\Models\Team;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Support\Facades\Mail; 
use App\Mail\NewUserCreate;
use Illuminate\Support\Facades\Session;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
    //dd($input);
     Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'sexe' => ['required', 'string', 'max:10'],
            'day' => ['required', 'string', 'max:2'],
            'month' => ['required', 'string', 'max:15'],
            'year' => ['required', 'string', 'max:4'],
            'phone' => ['required', 'string', 'max:30', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ])->validate();
        
     //send email to user
       /* $mailable = new NewUserCreate($input['name'],$input['firstname'],"La communauté Affranchie vous souhaite la cordiale bienvenue. Que la grâce de notre Seigneur Jésus-Christ soit avec vous!");
        Mail::to($input['email'])
                  ->send($mailable);
        */
     //Flash message
      Session::flash('success', 'La communauté Affranchie vous souhaite la cordiale bienvenue. Que la grâce de notre Seigneur Jésus-Christ soit avec vous!');
      return DB::transaction(function () use ($input) {
            return tap(User::create([
                'name' => $input['name'],
                'firstname' => $input['firstname'],
                'sexe' => $input['sexe'],
                'day' => $input['day'],
                'month' => $input['month'],
                'year' => $input['year'],
                'phone' => $input['phone'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]), function (User $user) {
                $this->createTeam($user);
                //Recuperation du role utilisateur,
                 $role = Role::select('id')->where('name','utilisateur')->first();
                 $user->roles()->attach($role);
            });
        });


    }
  

    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createTeam(User $user)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}
