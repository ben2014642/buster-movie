<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieCast extends Model
{
    use HasFactory;
    // protected $appends = ['character'];

    // public function getCharacterAttribute()
    // {
    //     return $this->character_name.'123';
    // }
    public function person()
    {
        return $this->belongsTo(Person::class);
    }


}
