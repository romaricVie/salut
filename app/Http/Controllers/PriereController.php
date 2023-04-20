<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Priere;

class PriereController extends Controller
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

    //

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('priere.create');
    }

     public function store(Request $request)
    {

    	
       request()->validate([
       	'phone' => ['required', 'string', 'max:50'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'subject' => ['required','string','min:2'],
        'image' => ['sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:1024000'], // 1000MO
        'user_id' => ['exists:users,id'],
      ]);

      
       Priere::create([
        "phone"=>$request->phone,
        "email"=>$request->email,
        "subject"=>$request->subject,
        "image"=>$this->storeImage(),
        "user_id"=>auth()->user()->id,
       ]);
       return redirect()->back()->with('success','Votre sujet a été bien réçu!');
     

    }

   private function storeImage()
    {
      if(request('image'))
      {  
          return request()->file('image')->store('priere_image','public');
      }

      return null;
    }



}
