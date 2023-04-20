<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class UsersManager extends Component
{
	use WithPagination;

	public $query="";
    public $perPage = 5;
    public $paginationTheme = 'bootstrap';

    
    public function updatingQuery()
    {   
    	$this->resetPage();
    }

    public function render()
    {
        return view('livewire.users-manager',[
        	"users" => User::where('name','like','%'.$this->query.'%')
                             ->orWhere('email','like','%'.$this->query.'%')
        	                 ->paginate($this->perPage)
        	             ]);
    }
}
