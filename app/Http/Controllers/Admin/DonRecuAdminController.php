<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Don;


class DonRecuAdminController extends Controller
{
    //

    public function index()
    {

       $response = Gate::inspect('super-admin');

       if($response->allowed()) {
      // The action is authorized...
        $totals = Don::whereStatus('ACTIF')
                          ->get('id');
                          
	        $dons = Don::whereStatus('ACTIF')
	                      ->latest()
	                      ->paginate(10);

	        return view('admin.dons.recus',[
                'totals'=>$totals,
                'dons' =>$dons,
          ]);
      }else{
         echo $response->message();
    }

    }

    public function show(Don $don)
    {
        
/*
        $donation = Donation::whereStatus('INACTIF')
                      ->latest()
                      ->get();*/
        return view('admin.dons.recu')->with('don',$don);
    }


    public function edit(Don $don)
    {
        
        return view('admin.dons-invites.edit')->with('donation',$donation);
    }


     public function update(Request $request, Donation $donation)
    {
        //

       
    }


     public function destroy(Don $don)
    {
        //

      
      
       $response = Gate::inspect('manage-users');

       if ($response->allowed()) {
       // The action is authorized...
        $donation->delete();
         return redirect()->route('admin.don.invite')->with('success','Dons supprimé avec succès!');
      }else{

         echo $response->message();
      }   
    }


}
