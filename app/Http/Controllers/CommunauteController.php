<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Communaute;
use App\Models\Publication;

class CommunauteController extends Controller
{
    //


     public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {

    	 $communautes = Communaute::where('id','>','0')
                                  ->where('status','ON')
                                  ->orderBy('start_at','DESC')
                                  ->paginate(10);
       return view("communautes.index")->with("communautes",$communautes);
    }

 
	public function store(Request $request)
	 {
     
       $request->validate([ 
        'name' => ['required','string','min:2'],
        'image' => ['required','image','mimes:jpg,png,jpeg,gif,svg','max:1024000'], // 1000 MO
        'description' => ['required','string','min:2'],
        'user_id' => ['exists:users,id'],
      ]);


      Communaute::create([
			         'name'=> $request->name,
			         'image'=> $this->storeImage(),
			         'description'=> $request->description,
			         'status'=>  'ON',
			         'user_id' => auth()->user()->id,
			       ]);


      return redirect()->route('communaute.index')->with('success','Page créée avec succès!');



	 }


	  public function show(Communaute $communaute)
		{
	     
          
           $publications = Publication::where("communaute_id",$communaute->id)
                          ->orderBy('created_at','DESC')
                          ->get();

          //  dd($publications);
	      return view('communautes.show',
            [
              'communaute' => $communaute,
              'publications' => $publications,
           ]);


		 }



   public function edit(Communaute $communaute)
   {
       
       return view('communautes.edit')->with('communaute',$communaute);
   }


   public function update(Request $request, Communaute $communaute)
   {
       
       $request->validate([ 
                      'name' => ['nullable','string','min:2'],
                      'image' => ['sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:1024000'], // 1000 MO
                      'description' => ['nullable','string','min:2'],
                      'user_id' => ['exists:users,id'],
                    ]);

         //dd($communaute);

         $communaute->update([
             "name" => $request->name,
             "image" =>  $this->storeImage()?? $communaute->image,
             "about" => $request->about,
             "description" => $request->description,

          ]);
          return redirect()->back()->with('success','Page modifiée avec succès!');

     
   }


    public function destroy(Communaute $communaute)
    {
    
      
        $communaute->delete();
        return redirect()->route('communaute.index')->with('success','Page supprimée avec succès!');

    }


    private function storeImage()
    {
      if(request('image'))
      {  
          return request()->file('image')->store('communautes_image','public');
      }

      return null;
    }





}
