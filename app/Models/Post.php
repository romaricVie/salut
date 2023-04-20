<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Likee;
use Carbon\Carbon;

class Post extends Model
{
    use HasFactory, Likee;

    protected $fillable = ['message','image','menu','status','user_id'];
  
   
   //Un poste peut avoir plusieurs likes
     public function likes()
    {
        return $this->belongsToMany('App\Models\User');
    }


    //Verification si post est aimé 
     public function isLiked()
    {
    	if(auth()->check()){

    		return auth()->user()->likes->contains('id',$this->id);
    	}
    }



}
