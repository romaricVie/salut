<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Event extends Component
{
	public $event;
    

	public function addLike()
	{

		return auth()->user()->likes()->toggle($this->event->id);
	}
	
    public function render()
    {

        return view('livewire.event',[
         'countLike' =>$this->event->likes()->count(),

        ]);
    }

    
}
