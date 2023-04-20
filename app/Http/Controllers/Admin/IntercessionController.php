<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Intercession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class IntercessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        /*
    
        where('status','ACTIF')
                      ->orderBy('start_at','DESC')
                      ->get();

        */

      $intercessions = Intercession::where('id','>','0')
                                   ->orderBy('created_at','DESC')
                                   ->latest()
                                   ->get();
   //dd($intercessions);
      return view('admin.intercessions.index')->with('intercessions',$intercessions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Intercession $intercession)
    {
        //
     
         $response = Gate::inspect('super-admin');

       if ($response->allowed()){
      // The action is authorized...
        //$intercession = new Intercession;
         return view('admin.intercessions.create')->with('intercession',$intercession);
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
      request()->validate([
        'subject' => ['required','string','min:2'],
        'display_at' =>['required','date','unique:intercessions']
      ]);
      
      //Instancier le model
      $intercession = new Intercession();
      $intercession->subject = request('subject');
      $intercession->display_at = request('display_at');
      $intercession->save();
      return redirect()->route('admin.index.intercessions')->with('success','Sujets de prière ajouté avec succès.');
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Intercession  $intercession
     * @return \Illuminate\Http\Response
     */
    public function show(Intercession $intercession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Intercession  $intercession
     * @return \Illuminate\Http\Response
     */
    public function edit(Intercession $intercession)
    {
        //
        //dd($intercession);
     return view('admin.intercessions.edit')->with('intercession',$intercession);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Intercession  $intercession
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Intercession $intercession)
    {
        //
        request()->validate([
        'subject' => ['required','string','min:2'],
        'display_at' =>['required','date']
      ]);

      $response = Gate::inspect('super-admin');

       if ($response->allowed()){
      // The action is authorized...
        
        $intercession->update([
         'subject' => $request->subject,
         'display_at' => $request->display_at,
        ]);

     return redirect()->route('admin.index.intercessions')->with('success','Mise à jour effectuée avec succès');
      }else{

         echo $response->message();
       }

     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Intercession  $intercession
     * @return \Illuminate\Http\Response
     */
    public function destroy(Intercession $intercession)
    {
        
         $response = Gate::inspect('super-admin');
        
        //send mail
         
           if ($response->allowed()) {
               // The action is authorized...
          
             $intercession->delete();
           
             return redirect()->back()->with('success','Sujet supprimé avec succès!');
              }else{

                 echo $response->message();
            }
    }
}
