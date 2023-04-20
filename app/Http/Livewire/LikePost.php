<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LikePost extends Component
{
	public $post;
    

	public function addLike()
	{

		return auth()->user()->likes()->toggle($this->post->id);
	}
	
    public function render()
    {

        return view('livewire.like-post',[
         'countLike' =>$this->post->likes()->count(),

        ]);
    }
}
