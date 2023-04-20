<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail; 
use App\Mail\postDeleted;

class PostAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $response = Gate::inspect('manage-users');

       if ($response->allowed()) {
      // The action is authorized...
         $totals = Post::where("status","INACTIF")
                        ->where('menu','publication')
                        ->get('id');

        $posts = Post::where("status","INACTIF")
                     ->where('menu','publication')
                     ->paginate(10);

        return view('admin.posts.index',[
              'totals'=> $totals,
              'posts'=> $posts,
             ]);
      }else{

         echo $response->message();
    }

        
        //dd($posts);
        //dd('Post-admin');
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
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function shows(User $user)
    {
          $posts = Post::where("status","INACTIF")
                        ->where('menu','publication')
                        ->where("user_id",$user->id)
                        ->orderBy('start_at','DESC')
                        ->get();

        return view('admin.posts.shows',[
           'user'=>$user,
           'posts' => $posts
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        // Edit statut
      $response = Gate::inspect('manage-users');

       if ($response->allowed()) {
       // The action is authorized...
        return view('admin.posts.edit',compact('post'));
      }else{

         echo $response->message();
    }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

//dd('eeeeeeeeee');
        //
  //dd($post->status);
       // $approuver = "ACTIF";
         $response = Gate::inspect('manage-users');

       if ($response->allowed()) {
       // The action is authorized...

        //Verification de status
        //dd($post->id);
   

        if($post->status=='INACTIF'){

           $post->status ="ACTIF";
           $post->update(['status' => $post->status]);

           // Notification
          // $notification = new PostApproved($post,$post->user);
          // $post->user->notify($notification);


         return redirect()->back()->with('success','Poste approuvé avec succès!');
        }else{
          return redirect()->back()->with('danger','Poste déjà approuvé!');
        }
       
      
      }else{

         echo $response->message();
    }


        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
            

        $response = Gate::inspect('manage-users');
        
        //send mail
        
           if ($response->allowed()) {

              $mailable = new postDeleted("Votre post ne respect pas les standards de la communauté.");
               Mail::to($post->user->email)
                  ->send($mailable);

             $post->delete();
           
            return redirect()->route('admin.index.posts')->with('success','Poste supprimé avec succès!');
              }else{

                 echo $response->message();
            }

        

    }

    
}
