<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class VilleDonAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    $response = Gate::inspect('manage-users');

       if ($response->allowed()) {
      // The action is authorized...
        $villes = Ville::get();         
        return view('admin.villes.index')->with('villes',$villes);
      }else{

         echo $response->message();
    }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //dd('created');
      $response = Gate::inspect('super-admin');

       if ($response->allowed()) {
      // The action is authorized...
      return view('admin.villes.create');
      }else{
         echo $response->message();
       }
       
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

        //dd(request()->all());
      request()->validate([
        'name' => ['required','string','min:2'],
        'responsable' => ['required','string','min:2'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'phone' => ['required','string'],
      ]);
      
     //creer point relais
     Ville::create([
            'name'=> $request->name,
            'responsable' => $request->responsable,
            'email' => $request->email,
            'phone' => $request->phone
            ]);
       return redirect()->back()->with('success','Point relais ajouté avec succès.');
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ville  $ville
     * @return \Illuminate\Http\Response
     */
    public function show(Ville $ville)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ville  $ville
     * @return \Illuminate\Http\Response
     */
    public function edit(Ville $ville)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ville  $ville
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ville $ville)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ville  $ville
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ville $ville)
    {
        //

       
         //dd('delete');
       $response = Gate::inspect('manage-users');

       if ($response->allowed()) {
       // The action is authorized...
         $ville->delete();
         return redirect()->back()->with('success','Point relais supprimé avec succès!');
      }else{

         echo $response->message();
      }   
    }

    
}
