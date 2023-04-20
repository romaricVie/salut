<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class Members extends Component
{
    use WithPagination;
   
  

    public function render()
    {
        return view('livewire.members',[

      "members" => User::where('id','>','0')
                     ->orderBy('start_at','DESC')
                     ->paginate(10)
        ]);
    }
}
