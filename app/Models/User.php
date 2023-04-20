<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;
use Carbon\Carbon;
class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'firstname','sexe','phone','day','month','year','email','city','country','job','religion','bio','web','conversion_date','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

 //Un utilisateur a un ou plusieurs topics;
    public function topics(){
        return $this->hasMany('App\Models\Topic')->latest();
    }

    // Un utilisateur à plusieurs commenaire
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

  // Un utilisateur a un et un seul verset prefere.
     public function prefere(){
        return $this->hasOne('App\Models\Prefere')->latest();
    }
    // Un utilisateur se convertir une et une seule fois.
     public function convertir(){
        return $this->hasOne('App\Models\Convertir')->latest();
    }

    //Un utilisateur a ou plusieurs posts;
    public function posts(){
        return $this->hasMany('App\Models\Post')->latest();
    }

    
    //Un utilisateur peut faire ou plusieurs dons;
    public function dons(){
        return $this->hasMany('App\Models\Don')->latest();
    }

    //Un utilisateur peut avoir un ou plusieurs sujets;
    public function prieres(){
        return $this->hasMany('App\Models\Priere')->latest();
    }

   //Many to Many
    // Un utilisateur à un ou plusieurs roles
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

   // Un user peut aimer plusieurs postes
    public function likes()
    {
        return $this->belongsToMany('App\Models\Post');
    }


    // Un user peut aimer plusieurs publications
    public function loves()
    {
        return $this->belongsToMany('App\Models\Publication');
    }


     /* new feature */
     // Un user  à une communautes
    public function communaute()
    {
        return $this->hasOne('App\Models\Communaute')->latest();
    }

      
    // user a plusieurs plusieurs publications
     public function publications()
    {
        return $this->hasMany('App\Models\Publication');
    }



  
  //superAdministrateur 
    public function gestionUtilisateur()
    {

        return $this->roles()->where('name','superAdministrateur')->first();
    }



    public function hasAnyRoles(array $roles)
    {
        return $this->roles()->whereIn('name',$roles)->first();
    }

  
/*
  public function getCreatedAtAttribute($date)
  {
    return Carbon::parse($date)->format('d M. Y');
  }*/

//start_at
  public function getStartAtAttribute($date)
  {
    return Carbon::parse($date)->format('d/m/Y');
  }



}
