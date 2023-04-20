<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Don;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail; 
use App\Mail\DonReceived;


class DonAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $response = Gate::inspect('super-admin');

       if($response->allowed()) {
      // The action is authorized...
          $totals = Don::whereStatus('INACTIF')
                        ->get('id');
            
          $dons = Don::whereStatus('INACTIF')
                        ->latest()
                        ->paginate(10);
          return view('admin.dons.index',[
                   'totals' =>$totals,
                   'dons'=>$dons
          ]);
      }else{
         echo $response->message();
    }

    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Models\Don  $don
     * @return \Illuminate\Http\Response
     */
    public function show(Don $don)
    {
        
/*
        $donation = Donation::whereStatus('INACTIF')
                      ->latest()
                      ->get();*/
        return view('admin.dons.show')->with('don',$don);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Don  $don
     * @return \Illuminate\Http\Response
     */
    public function edit(Don $don)
    {
        //
      //  return view('admin.dons.edit')->with('don',$don);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Don  $don
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Don $don)
    {
        //
      // dd('approuved');
        $response = Gate::inspect('super-admin');

       if ($response->allowed()) {
       // The action is authorized...

        //Verification de status
        //
       // $don = Don::find($don->id);

        if($don->status=='INACTIF'){

           $don->status ="ACTIF";
           $don->update(['status' => $don->status]);
         // Email Remerciement...
           
           $mailable = new DonReceived('Le departement social vous remercie pour vos dons, Que Dieu vous récompense abondamment.');
              Mail::to($don->email)
                  ->send($mailable);

         return redirect()->back()->with('success','Don reçu avec succès!');
        }else{
          return redirect()->back()->with('danger','Don déjà approuvé!!!');
        }
       
      
      }else{

         echo $response->message();
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Don  $don
     * @return \Illuminate\Http\Response
     */
    public function destroy(Don $don)
    {
        //
      //dd('delete');
       $response = Gate::inspect('manage-users');

       if ($response->allowed()) {
       // The action is authorized...
        $don->delete();
         return redirect()->route('admin.index.dons')->with('success','Dons supprimé avec succès!');
      }else{

         echo $response->message();
      }   
    }

    
}
