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
        $movie = Movie::where('slug',$slug)->first();
        // dd($movie->comments[0]->user);
        return view('user.movie.view',compact('movie'));
    }

    public function rateMovie($id, $star)
    {
        $movie = Movie::where('id',$id)->first();
        $movie->votes_count += 1;
        $temp = $movie->votes_avg + $star;
        $movie->votes_avg = $temp/$movie->votes_count;
        $movie->save();
        return 'ok';
    }
}
