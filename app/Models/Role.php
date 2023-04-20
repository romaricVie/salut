<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public $timestamps = false;

    //Many to many

   //Un role appartient à un ou plusieurs utilisateurs.
    public function users()
    {
    	return $this->belongsToMany('App\Models\User');
    }

}
