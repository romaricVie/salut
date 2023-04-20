<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;
use App\Models\Communaute;

class PublicationController extends Controller
{
    //
    //


     public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(Request $request, Communaute $communaute)
    {
		    
		        $request->validate([ 
					        'message' => ['required','string','min:2'],
					        'image' => ['sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:1024000'], // 1000 MO
					        'communaute_id' => ['exists:communautes,id'],
					        'user_id' => ['exists:users,id'],
					      ]);


       Publication::create([
			         'message'=> $request->message,
			         'image'=> $this->storeImage(),
			         'communaute_id'=> $communaute->id,
			         'user_id' => auth()->user()->id,
			       ]);

        return redirect()->back();
        
    }


    public function show(Publication $publication)
    {
    	//dd($publication);
        return view('communautes.comment')->with('publication',$publication);
    }


     public function destroy(Publication $publication)
    {
        
         
         $publication->delete();
        return redirect()->back()->with('success','post supprimé avec succès!');

    }


    private function storeImage()
    {
      if(request('image'))
      {  
          return request()->file('image')->store('publications_image','public');
      }

      return null;
    }
}
