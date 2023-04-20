<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Verset;
use App\Models\Book;

class VersetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $versets = Verset::where('id','>','0')
                                   ->orderBy('created_at','DESC')
                                   ->latest()
                                   ->get();

        return view('admin.verset.index')->with('versets',$versets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Verset $verset)
    {
        //
        $books = Book::get();
        return view('admin.verset.create',[
            "verset"=>$verset,
            "books"=>$books,
        ]);
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
       // dd($request->display_at);
        request()->validate([
        'book' => ['required','string'],
        'chapter' => ['required','integer'],
        'verse' => ['required','integer'],
        'text' => ['required','string'],
        'display_at' =>['required','date','unique:versets']
      ]);
     
        Verset::create([
          "book"=>$request->book,
          "chapter"=>$request->chapter,
          "verse"=>$request->verse,
          "text"=>$request->text,
          "display_at" => $request->display_at
         ]);

      return redirect()->route('admin.index.versets')->with('success','Verset ajouté avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Verset  $verset
     * @return \Illuminate\Http\Response
     */
    public function show(Verset $verset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Verset  $verset
     * @return \Illuminate\Http\Response
     */
    public function edit(Verset $verset)
    {
        //
        $books = Book::get();
       return view('admin.verset.edit',[
           "verset"=>$verset,
           "books"=>$books
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Verset  $verset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Verset $verset)
    {
        //
         request()->validate([
        'book' => ['required','string','min:2'],
        'chapter' => ['required','integer'],
        'verse' => ['required','integer'],
        'text' => ['required','string'],
        'display_at' =>['required','date']
      ]);
         

        $response = Gate::inspect('super-admin');

       if ($response->allowed()){
      // The action is authorized...
        $verset->update([
                    'book' => $request->book,
                    'chapter' => $request->chapter,
                    'verse' => $request->verse,
                    'text' => $request->text,
                    'display_at' => $request->display_at,
        ]);

        return redirect()->route('admin.index.versets')->with('success','Verset changé avec succès');
      }else{

         echo $response->message();
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Verset  $verset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Verset $verset)
    {
        //
       
         $response = Gate::inspect('super-admin');
        
        //send mail
         
           if ($response->allowed()) {
               // The action is authorized...
          
             $verset->delete();
           
             return redirect()->back()->with('success','verset supprimé avec succès!');
              }else{

                 echo $response->message();
            }

    }
}
