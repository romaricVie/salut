<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail; 
use App\Mail\Contacts;

class ContactController extends Controller
{
    //


    public function index()
    {

    	return view('contact.index');

    }


    public function store(Request $request)
    {

    	$request->validate([
        'name' => ['required','string'],
        'firstname' =>['required','string'],
        'email' => ['required', 'string', 'email','max:255'],
        'phone' => ['required', 'string', 'max:50'],
        'objet' => ['required','string','min:2'],
        'message' => ['required','string','min:5'],
      ]);

    Contact::create([
        'name' => $request->name,
        'firstname' =>$request->firstname,
        'email' => $request->email,
        'phone' => $request->phone,
        'objet' => $request->objet,
        'message' => $request->message,
    ]);
    
    //send email to admin
      $mailable = new Contacts($request->name, $request->firstname, $request->email,$request->phone, $request->objet,$request->message);
        Mail::to(config('affranchie.admin_support_email'))
                  ->send($mailable);

     return redirect()->back()->with('success','Message bien récu!');
    }
}
