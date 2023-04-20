<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Likee;

class Convertir extends Model
{
    use HasFactory,Likee;

     protected $fillable = [
        'pays', 'ville','habitation','email','phone','motivation','image','user_id'
    ];
}
