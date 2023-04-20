<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\Priere;
use App\Models\User;

class PriereAdminController extends Controller
{
    //
     public function index()
    {
        //
      $response = Gate::inspect('manage-users');

       if ($response->allowed()) {
      // The action is authorized...
        $totals = Priere::get('id');
        $prieres = Priere::latest()
                        ->paginate(10);
        return view('admin.prieres.index',[
          'totals'=> $totals,
          'prieres' => $prieres,
        ]);

      }else{

         echo $response->message();
    }
}

  public function shows(User $user)
  {
  	  
     return view('admin.prieres.shows')->with('user',$user);
  } 


  public function destroy(Priere $priere)
  {
  
  
    $response = Gate::inspect('manage-users');
  
         if ($response->allowed()) {
               // The action is authorized...
                // Email d'explication
                $priere->delete();
                return redirect()->back()->with('success','Demande supprimée avec succès!');
              }else{
                 echo $response->message();
            }

  }




}
