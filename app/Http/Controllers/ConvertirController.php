<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Convertir;

class ConvertirController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view('convertir.create');
    }


     public function store(Request $request)
    {

    	
       $request->validate([
        'pays' => ['required','string'],
        'ville' => ['required','string'],
        'habitation' => ['required','string'],
        'phone' => ['required', 'string', 'max:50'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'motivation' => ['required','string'],
        'image' => ['required','image','mimes:jpg,png,jpeg,gif,svg','max:1024000'], // 1000MO 
        'user_id' => ['exists:users,id'],
      ]);

      $convertir = new Convertir();

      $convertir->pays = $request->pays;
      $convertir->ville = $request->ville;
      $convertir->habitation = $request->habitation;
      $convertir->phone = $request->phone;
      $convertir->email = $request->email;
      $convertir->motivation = $request->motivation;
      $convertir->image = $this->storImage();
      $convertir->user_id = auth()->user()->id;
      $convertir->save();
      //
      return redirect()->back()->with('success','Vous serez contactés par le département des administrateurs. Que la grâce de notre Seigneur Jésus-Christ soit avec vous!');
     

    }


     private function storImage()
    {
        return request()->file('image')->store('images_convertir','public');
    }



}
