<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieCast extends Model
{
    use HasFactory;
    protected $appends = ['person_name'];

    public function getPersonNameAttribute()
    {
        return $this->person->name;
    }
    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class,'movie_id','id');
    }


}
