<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Intercession;
use Carbon\Carbon;
class IntercessionUserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
    	 $intercession = Intercession::where('display_at',Carbon::today())->first();
         return view('intercession.index')->with('intercession',$intercession);
    }
}
