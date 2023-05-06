<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Celebrity extends Model
{
    use HasFactory;
    protected $table = 'persons';
    public $timestamps = false;
    protected $fillable = ['name', 'introduce', 'slug', 'image', 'country'];

    public function casts()
    {
        return $this->hasMany(MovieCast::class,'person_id','id');
    }

    public function images()
    {
        return $this->hasMany(ImageCelebrities::class,'person_id','id');
    }
}
