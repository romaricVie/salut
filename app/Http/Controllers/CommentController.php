<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Topic;
use App\Notifications\CommentNotification;

class CommentController extends Controller
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

  public function store(Topic $topic)
  {
  	 //dd($topic->id);

  	   request()->validate([
          'comment' => ['required','string','min:2'],
		]);

  	$comment = new Comment();
		$comment->comment = request('comment');
		$comment->user_id = auth()->user()->id; // id le l'utilisateur connecté;
        
    //Relation permettant de récuperer id du Articles,
		$topic->comments()->save($comment);

    //Notification
     $notification = new CommentNotification($topic,$comment->user);
     $topic->user->notify($notification);

		return redirect()->back();


  }


  public function destroy(Comment $comment)
  {
      
        $comment->delete();
        return redirect()->back()->with('success','Commentaire supprimé avec succès!');
  }



}
