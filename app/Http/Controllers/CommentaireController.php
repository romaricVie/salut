<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentaire;
use App\Models\Publication;

class CommentaireController extends Controller
{
    //
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

  public function store(Publication $publication)
  {
  	 //dd($topic->id);
  	// dd($publication);

  	   request()->validate([
          'comment' => ['required','string','min:2'],
          'publication_id' => ['exists:publications,id'],
          'user_id' => ['exists:users,id'],
		]);

  	    $comment = new Commentaire();
		$comment->comment = request('comment');
		$comment->publication_id = $publication->id; 
		$comment->user_id = auth()->user()->id; // id le l'utilisateur connecté;
        
    //Relation permettant de récuperer id du Articles,
		$publication->commentaires()->save($comment);

    //Notification

		return redirect()->back();


  }

     public function destroy(Commentaire $commentaire)
    {
        
         //dd($commentaire);
         
         $commentaire->delete();
         return redirect()->back()->with('success','commentaire supprimé avec succès!');

    }

}
