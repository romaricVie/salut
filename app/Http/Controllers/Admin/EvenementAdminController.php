<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Mail; 
//use App\Mail\EventApproved;
//use App\Mail\postDeleted;
use App\Notifications\EvenementApproved;
use App\Notifications\EventDeleted;

class EvenementAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      //dd('events');
        $response = Gate::inspect('manage-users');

       if ($response->allowed()) {
      // Thetotals action is authorized...
         $totals = Post::where("status","INACTIF")
                        ->where('menu','event')
                        ->get('id');

        $posts = Post::where("status","INACTIF")
                      ->where('menu','event')  
                      ->latest()
                      ->paginate(10);

        return view('admin.events.index',[
            'totals'=>$totals,
            'posts'=>$posts,
        ]);
      }else{

         echo $response->message();
    }
        
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evenement  $evenement
     * @return \Illuminate\Http\Response
     */
    public function shows(User $user)
    {
        //
      $posts = Post::where("status","INACTIF")
                  ->where('menu','event')  
                  ->where("user_id",$user->id)
                  ->orderBy('start_at','DESC')
                  ->get();

       return view('admin.events.shows',[
       'user'=> $user,
       'posts' => $posts
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
     
        $response = Gate::inspect('manage-users');

       if ($response->allowed()) {
       // The action is authorized...
        return view('admin.events.edit',compact('post'));
      }else{

         echo $response->message();
    }
        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evenement  $evenement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
   
      $response = Gate::inspect('manage-users');

       if ($response->allowed()) {
       // The action is authorized...

        if($post->status =='INACTIF'){

          $post->status ="ACTIF";
          $post->update(['status' => $post->status]);
        
         return redirect()->back()->with('success','Evènement approuvé avec succès!');
        }else{
          return redirect()->back()->with('danger','Evènement déjà approuvé!');
        }
     
      }else{

         echo $response->message();
      } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evenement  $evenement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
       $response = Gate::inspect('manage-users');
       
       if ($response->allowed()) {
       // The action is authorized...

        //Notification
       // $notification = new EventDeleted($evenement,$evenement->user);
      //  $evenement->user->notify($notification);
        $post->delete();

        //Email d'explication

         return redirect()->route('admin.index.evenements')->with('success','Evenement supprimé avec succès!');
      }else{

         echo $response->message();
    }

        
    }
}
