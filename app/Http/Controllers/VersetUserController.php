<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Verset;
use App\Models\Prefere;
use App\Models\Book;
use Carbon\Carbon;
class VersetUserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	 $verset = Verset::where('display_at',Carbon::today())->first();

         return view('verset-jour.index')->with('verset',$verset);
    }

    
    //create verset préféré
    public function create()
    {
        $books = Book::get();
        
         return view('verset-jour.create')->with('books',$books);
    }

    //store verset préféré

    public function store(Request $request)
    {
       
        $request->validate([
        'book' => ['required','string'],
        'chapter' => ['required','integer'],
        'verse' => ['required','integer'],
        'text' => ['required','string'],
        'user_id' => ['exists:users,id'],
      ]);

         Prefere::create([
          "book"=>$request->book,
          "chapter"=>$request->chapter,
          "verse"=>$request->verse,
          "text"=>$request->text,
           "user_id" => auth()->user()->id
         ]);
     return redirect()->back()->with('success','Verset préféré enregistré');
    }
}
