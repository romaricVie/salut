<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TemoignageController extends Controller
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
                                ->where('menu','temoignage')
                                ->orderBy('start_at','DESC')
                                ->take(15)
                                ->get();
     //  $posts = DB::table("posts")->get();

       // dd($posts);
          
        return view('temoignages.index')->with('posts',$posts);
    }


     public function display_all()
    {
        //
        $posts = Post::where("status","ACTIF")
                                ->where('menu','temoignage')
                                ->orderBy('start_at','DESC')
                                ->get();
     //  $posts = DB::table("posts")->get();

       // dd($posts);
          
        return view('temoignages.index')->with('posts',$posts);
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
        
       request()->validate([
        'message' => ['required','string','min:2'],
        'image' => ['sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:1024000'], // 1000MO
        'user_id' => ['exists:users,id'],
      ]);
      
        Post::create([
         'message'=> $request->message,
         'image'=> $this->storeImage(),
         'menu'=> 'temoignage',
         'status'=> auth()->user()->hasAnyRoles(['superAdministrateur','administrateur','moderateur']) ? 'ACTIF':'INACTIF',
         'user_id' => auth()->user()->id,

       ]);

         return redirect()->back()->with('success','Merci de patienter! votre témoignage sera approuvé par un modérateur.');
      

    }


     private function storeImage()
    {
      if(request('image'))
      {  
          return request()->file('image')->store('temoignage_image','public');
      }

      return null;
    }
}
