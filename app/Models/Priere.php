<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Likee;

class Priere extends Model
{
    use HasFactory,Likee;

    
    
    protected $fillable = ['subject','phone','email','image','user_id'];
}
