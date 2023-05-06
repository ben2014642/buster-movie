<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageCelebrityUpload extends Model
{
    use HasFactory;
    public $table = 'image_celebrities';
    protected $fillable = ['person_id','url'];
    
}
