<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Enseignement extends Component
{

	public $enseignement;
    

	public function addLike()
	{

		return auth()->user()->likes()->toggle($this->enseignement->id);
	}
	
    public function render()
    {

        return view('livewire.enseignement',[
         'countLike' =>$this->enseignement->likes()->count(),

        ]);
    }
  
}
