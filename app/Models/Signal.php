<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Likee;

class Signal extends Model
{
     use HasFactory,Likee;

     protected $fillable = ['message','image','communaute_id','user_id'];



     //Un signal appartient à une communaute
    public function communaute()
    {
        return $this->belongsTo(Communaute::class);
    }

}
