<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class SearchMember extends Component
{

	public $query="";
    
    public $members =[];
    
    public function updatedQuery()
    {
        //dd('query');
      $this->validate([
             'query' => ['required','string','min:1'],
         ]);

    	if(strlen($this->query)>0)
    	{
    	   $this->members = User::where('name','like','%'.$this->query.'%')
                         // ->orWhere('email','like','%'.$this->query.'%')
                         ->orWhere('firstname','like','%'.$this->query.'%')
                         // ->orWhere('phone','like','%'.$this->query.'%')
                         ->get();
                   
    	}
    	
    } 
    
    public function render()
    {
    	
    return view('livewire.search-member');   
    }
}
