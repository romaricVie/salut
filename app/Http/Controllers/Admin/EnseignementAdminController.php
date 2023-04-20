<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail; 
use App\Mail\postDeleted;


class EnseignementAdminController extends Controller
{

	
    public function index()
    {
        //


        $response = Gate::inspect('manage-users');

       if ($response->allowed()) {
      // The action is authorized...
         $totals = Post::where("status","INACTIF")
                        ->where('menu','enseignement')
                        ->get('id');

        $posts = Post::where("status","INACTIF")
                     ->where('menu','enseignement')
                     ->paginate(10);

        return view('admin.enseignements.index',[
              'totals'=> $totals,
              'posts'=> $posts,
             ]);
      }else{

         echo $response->message();
    }

        
 
    }



     public function shows(User $user)
    {
        
        $posts = Post::where("status","INACTIF")
                        ->where('menu','enseignement')
                        ->where("user_id",$user->id)
                        ->orderBy('start_at','DESC')
                        ->get();

        return view('admin.enseignements.shows',[
           'user'=>$user,
           'posts' => $posts
        ]);
    }


     public function update(Request $request, Post $post)
    {



    
       // $approuver = "ACTIF";
         $response = Gate::inspect('manage-users');

       if ($response->allowed()) {
       // The action is authorized...


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


    public function destroy(Post $post)
    {
        


        $response = Gate::inspect('manage-users');
        
        //send mail
         
           if ($response->allowed()) {

          $mailable = new postDeleted("Votre post ne respect pas les standards de la communauté.");
               Mail::to($post->user->email)
                  ->send($mailable);

           $post->delete();
           
            return redirect()->route('admin.index.enseignements')->with('success','Poste supprimé avec succès!');
              }else{

                 echo $response->message();
            }

        

    }



}
