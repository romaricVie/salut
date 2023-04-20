<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail; 
use App\Mail\postDeleted;

class TemoignageAdminController extends Controller
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
                        ->where('menu','temoignage')  
                        ->get('id');

         $posts = Post::where("status","INACTIF")
                      ->where('menu','temoignage') 
                      ->latest()
                      ->paginate(10);
                      
        return view('admin.temoignages.index',[
                'totals'=>$totals,
                'posts'=>$posts
        ]);
      }else{

         echo $response->message();
    }

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function shows(User $user)
    {
        //
       $posts = Post::where("status","INACTIF")
                    ->where("menu","temoignage")
                    ->where("user_id",$user->id)
                    ->orderBy('start_at','DESC')
                    ->get();

      return view('admin.temoignages.shows',[
         'user'=>$user,
         'posts'=> $posts
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
        //
         $response = Gate::inspect('manage-users');

       if ($response->allowed()) {
       // The action is authorized...
        return view('admin.temoignages.edit',compact('post'));
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
        //
        $response = Gate::inspect('manage-users');

       if ($response->allowed()) {
       // The action is authorized...

         if($post->status=='INACTIF'){

           $post->status ="ACTIF";

          $post->update(['status' => $post->status]);

         return redirect()->back()->with('success','Temoignage approuvé avec succès!');
        }else{
            
          return redirect()->back()->with('danger','Temoignage déjà approuvé!');
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
        //

         $response = Gate::inspect('manage-users');

       if ($response->allowed()) {
       // The action is authorized...
   
       $mailable = new postDeleted("Votre post ne respect pas les standards de la communauté.");
               Mail::to($post->user->email)
                  ->send($mailable);
      $post->delete();
     return redirect()->back()->with('success','Evenement supprimé avec succès!');;
      }else{

         echo $response->message();
    }

    }
}
