<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Likee;
use Carbon\Carbon;
use Illuminate\Support\Str;


class Communaute extends Model
{
    use HasFactory,Likee;

     protected $fillable = ['name','image','description','status','user_id'];



   //Creaction du slug lors de la creation de l'article;
  protected static function boot()
   {

     parent::boot();
     static::creating(function($event){
       $event->slug = Str::slug($event->name,'-');
     });
   }

  //return le slug de la communaute
  public function getRouteKeyName()
   {
   	  return 'slug';
   }

    // une communaute a un ou plusieurs publications
     public function publications()
      {
          return $this->hasMany('App\Models\Publication');
      }

      //une communaute a un ou plusieurs signals
     public function signals()
     {
          return $this->hasMany('App\Models\Signal');
     }



      //start_at
  public function getStartAtAttribute($date)
  {
    return Carbon::parse($date)->format('d/m/Y');
  }


}
