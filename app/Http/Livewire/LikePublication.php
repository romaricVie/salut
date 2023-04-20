<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LikePublication extends Component
{

	public $publication;
    

	public function adLove()
	{

		return auth()->user()->loves()->toggle($this->publication->id);
	}
    public function render()
    {
        return view('livewire.like-publication',[
         'countLike' =>$this->publication->loves()->count(),

        ]);
    }
}
