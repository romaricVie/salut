<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
           $posts = Post::where("status","ACTIF")
                    ->where('menu','event')
                    ->orderBy('start_at','DESC')
                    ->take(15)
                    ->get();

        return view('evenements.index')->with('posts',$posts);
    }


     public function display_all()
    {
        //
           $posts = Post::where("status","ACTIF")
                    ->where('menu','event')
                    ->orderBy('start_at','DESC')
                    ->get();

        return view('evenements.index')->with('posts',$posts);
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
        $request->validate([
        'message' => ['required','string','min:2'],
        'image' => ['sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:1024000'], // 1000 MO
        'user_id' => ['exists:users,id'],
      ]);
      

       Post::create([
         'message'=> $request->message,
         'image'=> $this->storeImage(),
         'menu'=> 'event',
         'status'=> auth()->user()->hasAnyRoles(['superAdministrateur','administrateur','moderateur']) ? 'ACTIF':'INACTIF',
         'user_id' => auth()->user()->id,

       ]);
      return redirect()->back()->with('success','Merci de patienter! votre évènement sera approuvé par un modérateur.');
     
    }

   

    private function storeImage()
    {
      if(request('image'))
      {  
          return request()->file('image')->store('event_image','public');
      }

      return null;
    }
}
