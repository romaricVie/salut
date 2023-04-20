<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Likee;

class Commentaire extends Model
{
    use HasFactory,Likee;


      protected $fillable = ['comment','publication_id','user_id'];

     /**
     * Get the parent commentable model (publication or posts).
     */
    public function commentable()
    {
        return $this->morphTo();
    }


     //Une comment appartient à une communaute
     public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
