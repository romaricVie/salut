<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Likee;

class Topic extends Model
{
    use HasFactory,Likee;

    protected $fillable = ['title','content','user_id'];


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    


}
