<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Convertir;
use App\Models\User;

class ConvertirAdminController extends Controller
{
    //

    public function index()
    {
    	 $response = Gate::inspect('super-admin');

       if($response->allowed()) {
      // The action is authorized...
        $totals = Convertir::get('id');

        $convertis = Convertir::latest()
                           ->paginate(10);
      
        return view('admin.convertis.index',[
             'totals' => $totals,
            'convertis' => $convertis
        ]);
      }else{
         echo $response->message();
    }

    }


     public function show(User $user)
    {
    	 $response = Gate::inspect('super-admin');

       if($response->allowed()) {
      // The action is authorized...
       
        return view('admin.convertis.show')->with('user',$user);
      }else{
         echo $response->message();
    }
    }




}
