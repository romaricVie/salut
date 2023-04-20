<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Temoignage extends Component
{

	public $temoignage;
    

	public function addLike()
	{

		return auth()->user()->likes()->toggle($this->temoignage->id);
	}
	
    public function render()
    {

        return view('livewire.temoignage',[
         'countLike' =>$this->temoignage->likes()->count(),

        ]);
    }

}
