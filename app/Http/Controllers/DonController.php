<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Don;
use App\Models\Ville;

class DonController extends Controller
{

   

   //guest user
     public function show()
    {
        //

       $villes = Ville::all();
       return view('dons.show')->with('villes',$villes);
    }


  // auth user
    public function index()
    {
        //
        $villes = Ville::all();

       return view('dons.index')->with('villes',$villes);
    }

    

     public function store(Request $request)
    {

    //dd(Request()->all());

     $request->validate([
        'name' => ['required','string'],
        'firstname' =>['required','string'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'phone' => ['required', 'string', 'max:50'],
        'nom_produit' => ['required','string','min:2'],
        'description' => ['required','string','min:2'],
        'type' => ['required','string','min:2'],
        'etat_don' => ['sometimes','required','string','min:2'],
        'point_relais' => ['required','string','min:5'],
        'status' => ['string'],
        'images' => ['required','image','mimes:jpg,png,jpeg,gif,svg','max:1024000'], // 1000MO
      ]);

       Don::create([
        'name' => $request->name,
        'firstname' =>$request->firstname,
        'email' => $request->email,
        'phone' => $request->phone,
        'nom_produit' => $request->nom_produit,
        'description' => $request->description,
        'type' => $request->type,
        'etat_don' => $request->etat_don,
        'point_relais' => $request->point_relais,
        'status' => "INACTIF",
        'images' => $this->storImage(),
    ]);
    
     return redirect()->back()->with('success','Votre don a été enrégistré avec succès! vous serez contactés par le département social.');
    }


    private function storImage()
    {
        return request()->file('images')->store('images_don','public');
    }

    
   
}
