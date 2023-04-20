<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Communaute;
use App\Models\Signal;

class SignalController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

 
 public function create(Communaute $communaute)
 {
     
     return view('communautes.signal')->with('communaute',$communaute);
 }


 public function store(Request $request, Communaute $communaute)
	 {
	 	   $request->validate([ 
					        'message' => ['required','string','min:2'],
					        'image' => ['sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:1024000'], // 1000 MO
					        'communaute_id' => ['exists:communautes,id'],
					        'user_id' => ['exists:users,id'],
					      ]);


       Signal::create([
			         'message'=> $request->message,
			         'image'=> $this->storeImage(),
			         'communaute_id'=> $communaute->id,
			         'user_id' => auth()->user()->id,
			       ]);

        return redirect()->back()->with('success', 'Message bien reçu!');
	 }


	  private function storeImage()
    {
      if(request('image'))
      {  
          return request()->file('image')->store('siganal_image','public');
      }

      return null;
    }





}
