<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intercession extends Model
{
    use HasFactory;

    protected $fillable = ['subject','display_at'];
}
