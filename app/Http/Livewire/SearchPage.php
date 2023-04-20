<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Communaute;

class SearchPage extends Component
{
	public $query="";
    public $communautes =[];


    public function updatedQuery()
	    {
	        //dd('query');
	      $this->validate([
	             'query' => ['required','string','min:1'],
	         ]);

	    	if(strlen($this->query)>0)
	    	{
	    	   $this->communautes = Communaute::where('name','like','%'.$this->query.'%')
	                                 ->orWhere('name','like','%'.$this->query.'%')
	                                 ->orWhere('created_at','like','%'.$this->query.'%')
	                                 ->get();        
	    	}
	    	
	    } 



    public function render()
    {
        return view('livewire.search-page');
    }
}
