<?php


namespace App\Models\Traits;
use Carbon\Carbon;
/*
* permet de partager les methodes entre les classes;
*/
trait Likee
{
     // Un post appartient à un utilisateur
	public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
/*

   public function getCreatedAtAttribute($date)
  {
    return Carbon::parse($date)->format('d M. Y'.' à '.' H:s');
  }*/
//start_at
  /*
   public function getStartAtAttribute($date)
  {
    return Carbon::parse($date)->format('d M. Y'.' à '.' H:s');
  }
*/
}

