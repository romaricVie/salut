<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Contact;

class ContactAdminController extends Controller
{
    //

     public function index()
    {
    	 $response = Gate::inspect('gestion-utilisateur');

       if($response->allowed()) {
      // The action is authorized...
        $totals = Contact::get('id');

         $contacts = Contact::latest()
                        ->paginate(10);
       // dd($convertis);
        return view('admin.contacts.index',[
                'totals' =>$totals,
                'contacts' =>$contacts
        ]);
      }else{
         echo $response->message();
    }

    }



    public function show(Contact $contact)
    {
    	 $response = Gate::inspect('gestion-utilisateur');

       if($response->allowed()) {
      // The action is authorized...
       
        return view('admin.contacts.show')->with('contact',$contact);
      }else{
         echo $response->message();
    }
}


     public function destroy(Contact $contact)
    {
        //
    
      $response = Gate::inspect('gestion-utilisateur');

       if ($response->allowed()) {
       // The action is authorized...
        $contact->delete();
         return redirect()->route('admin.contact.index')->with('success','Message supprimé avec succès!');
      }else{

         echo $response->message();
      }   
    }






}
