<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Temoignage;
use App\Models\Evenement;


class ProfilController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        
            
           $posts = Post::where("status","ACTIF")
                          ->where("menu","publication")
                          ->where("user_id",$user->id)
                          ->orderBy('start_at','DESC')
                          ->get();
           $temoignages = Post::where("status","ACTIF")
                          ->where("menu","temoignage")
                          ->where("user_id",$user->id)
                          ->orderBy('start_at','DESC')
                          ->get();
           $events = Post::where("status","ACTIF")
                         -> where("menu","event")
                          ->where("user_id",$user->id)
                          ->orderBy('start_at','DESC')
                          ->get();
          $enseignements = Post::where("status","ACTIF")
                         -> where("menu","enseignement")
                          ->where("user_id",$user->id)
                          ->orderBy('start_at','DESC')
                          ->get();

           $postInactifs = Post::where("status","INACTIF")
                          ->where("user_id",auth()->user()->id)
                          ->orderBy('start_at','DESC')
                          ->get();

              $postactifs = Post::where("status","ACTIF")
                          ->where("user_id",$user->id)
                          ->get();
              
             
        return view('profile.index',
            [
              'user' => $user,
              'posts' => $posts,
              'temoignages' => $temoignages,
              'events' =>  $events,
              'enseignements' => $enseignements,
              'postInactifs' => $postInactifs,
              'postactifs'=> $postactifs
           ]);
    }

    
}
