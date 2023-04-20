<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Verset;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
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
    public function index()
    {
        // 
      $posts = Post::where('status','ACTIF')
                      ->orderBy('start_at','DESC')
                      ->take(25) //70
                      ->get();
     $verset = Verset::where('display_at',Carbon::today())->first();
       
        return view('dashboard',[
          'posts' =>$posts,
          'verset' => $verset,
        ]);
    }

     public function display_all()
    {
        // 
      $posts = Post::where('status','ACTIF')
                      ->orderBy('start_at','DESC')
                      ->get();
     $verset = Verset::where('display_at',Carbon::today())->first();
       
        return view('dashboard',[
          'posts' =>$posts,
          'verset' => $verset,
        ]);
    }


    public function shows()
    {
      
    
       $postInactifs = Post::where("status","INACTIF")
                       ->where("user_id",auth()->user()->id)
                       ->orderBy('start_at','DESC')
                       ->get();

        return view('posts.shows')->with('postInactifs',$postInactifs);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       
       $request->validate([
        'message' => ['required','string','min:2'],
        'image' => ['sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:1024000'], // 1000 MO
        'user_id' => ['exists:users,id'],
      ]);



       Post::create([
         'message'=> $request->message,
         'image'=> $this->storeImage(),
         'menu'=> 'publication',
         'status'=> auth()->user()->hasAnyRoles(['superAdministrateur','administrateur','moderateur']) ? 'ACTIF':'INACTIF',
         'user_id' => auth()->user()->id,

       ]);

      return redirect()->back()->with('success','Merci de patienter! votre publication sera approuvée par un modérateur.');

    }

   


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
       
      
        $post->delete();
        return redirect()->back()->with('success','Post supprimé avec succès!');
    }
  


    private function storeImage()
    {
      if(request('image'))
      {  
          return request()->file('image')->store('post_image','public');
      }

      return null;
    }
}
