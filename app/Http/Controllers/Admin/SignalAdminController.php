<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Communaute;
use App\Models\Signal;
use App\Models\User;

class SignalAdminController extends Controller
{
    //
    
    public function index()
    {

    	$signals = Signal::paginate(10);
      
      return view('admin.communautes.index')->with('signals', $signals);
    }


    public function show(Signal $signal)
    {
      
       return view('admin.communautes.show')->with('signal',$signal);
    }
    
    
    public function bloquer(Request $request, Communaute $communaute)
    {

        if($communaute->status=='ON'){

           $communaute->status ="OFF";
           $communaute->update(['status' => $communaute->status]);     

         return redirect()->back()->with('success','Page bloquee avec succès!');
        }else{
          return redirect()->back()->with('danger','Page déjà bloquee!');
        }
    }

     public function activer(Request $request, Communaute $communaute)
    {

        if($communaute->status=='OFF'){

           $communaute->status ="ON";
           $communaute->update(['status' => $communaute->status]);     

         return redirect()->back()->with('success','Page activee avec succès!');
        }else{
          return redirect()->back()->with('danger','Page déjà activee!');
        }
    }


    public function destroy(Signal $signal)
    {

          $signal->delete();
           
            return redirect()->route('admin.index.signals')->with('success','signal supprimé avec succès!');
    }
  


    public function supprimer(Communaute $communaute)
    {

         
           $communaute->delete();
           
            return redirect()->route('admin.index.signals')->with('success','signal supprimé avec succès!');
    }


    

}
