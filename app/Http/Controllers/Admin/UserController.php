<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\Contact;
use App\Models\Convertir;
use App\Models\Post;
use App\Models\Don;
use App\Models\Priere;
use App\Models\Ville;
use App\Models\Communaute;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function dashboard()
    {
     
      // Users

        $users = User::get('id');

        $pages = Communaute::all();

     //Publication inactif
      $enseignements = Post::where("status","INACTIF")
                     ->where('menu','enseignement') 
                      ->get('id');

     //Temoignage inactif
    $temoignages = Post::where("status","INACTIF")
                        ->where('menu','temoignage')  
                        ->get('id');


    // event
     $evenements = Post::where("status","INACTIF")
                        ->where('menu','event');
 
   // event
     $publications = Post::where("status","INACTIF")
                        ->where('menu','publication');
 
    //Don
    $dons = Don::whereStatus('INACTIF')
                        ->get('id');
      //Don
    $donations = Don::whereStatus('ACTIF')
                        ->get('id');
     //Contact
    $messages = Contact::get('id');
     // Prière
    $prieres = Priere::get('id');
     //convertis
     $convertis = Convertir::get('id');

      //ville
    $villes = Ville::get('id');

    return view('admin.index',[
      'users'=>$users,
      'pages' => $pages,
      'enseignements'=>$enseignements,
      'temoignages'=>$temoignages,
      'evenements'=>$evenements,
      'publications'=>$publications,
      'dons'=>$dons,
      'prieres'=>$prieres,
      'donations'=>$donations,
      'convertis' => $convertis,
      'villes' => $villes,
      'messages'=> $messages
    ]);
    
    }

    public function index()
    {
        //
       // $users = User::all();
      $response = Gate::inspect('gestion-utilisateur');

       if($response->allowed()) {
      // The action is authorized...
         $membres = User::get('id');
        return view('admin.users.index')->with('membres',$membres);
      }else{

         echo $response->message();
    }
     //->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
         //dd('edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        $response = Gate::inspect('gestion-utilisateur', $user);

       if ($response->allowed()) {
    // The action is authorized...
        $roles = Role::all();
         return view('admin.users.edit',[
           'user' => $user,
           'roles' => $roles
         ]);

        }else{
         echo $response->message();
    }
        //
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $response = Gate::inspect('gestion-utilisateur',$user);

       if ($response->allowed()) {
    // The action is authorized...
         $user->roles()->sync($request->roles);
         $user->save();
         return redirect()->back()->with('success','Roles modifiés avec succès!');
        }else{
         echo $response->message();
    }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //

        $response = Gate::inspect('gestion-utilisateur');

       if ($response->allowed()) {
    // The action is authorized...
          $user->roles()->detach();
          $user->delete();
         return redirect()->back();
        }else{
         echo $response->message();
    }

       

    }
}
