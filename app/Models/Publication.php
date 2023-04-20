<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Likee;
use Carbon\Carbon;
//use Illuminate\Support\Str;


class Publication extends Model
{
    use HasFactory,Likee;

     protected $fillable = ['message','image','communaute_id','user_id'];

   
     //Une publication appartient à une communaute
     public function communaute()
    {
        return $this->belongsTo('App\Models\Communaute');
    }

    
     /**
     * Get all of the publication's comments.
     */
    public function commentaires()
    {
        return $this->morphMany(Commentaire::class, 'commentable');
    }


    //une publication peut etre aimée pas plusieurs utilisateurs.

    public function loves()
    {
         return $this->belongsToMany('App\Models\User');
    }


  public function isLoved()
    {
        if(auth()->check()){

            return auth()->user()->loves->contains('id',$this->id);
        }
    }


    



}
