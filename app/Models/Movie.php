<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'slug', 'thumbnail', 'description', 'release_date', 'revenue', 'status'
    ];
    // protected $appends = ['comments'];

    public function images()
    {
        return $this->hasMany(ImageUpload::class);
    }

    public function casts()
    {
        return $this->hasMany(MovieCast::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
