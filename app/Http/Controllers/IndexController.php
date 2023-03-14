<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('user.index');
    }
    public function movie()
    {
        $movies = Movie::all();
        return view('user.movie.index',compact('movies'));
    }

    public function view_movie($slug)
    {
        $movie = Movie::where('slug',$slug)->with('images','casts')->first();
        dd($movie->casts[0]->character);
        return view('user.movie.view',compact('movie'));
    }
}
