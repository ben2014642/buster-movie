<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['comment','user_id','movie_id'];
    protected $appends = ['name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getNameAttribute()
    {
        return $this->user->name;
    }

    public static function getTotalComment($movie_id)
    {
        $total = Comment::where('movie_id','=',$movie_id)->count();

        return $total;
    }
}
