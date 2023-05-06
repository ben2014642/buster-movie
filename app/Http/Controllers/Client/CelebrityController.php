<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Celebrity;
use App\Models\ImageCelebrities;
use App\Models\Movie;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CelebrityController extends Controller
{
    public function index()
    {
        $celebrities = Celebrity::paginate(6);
        return view('client.celebrity.index',compact('celebrities'));
    }

    public function search(Request $request)
    {
        $query = Celebrity::query();
        if ($request->name != '') {
            $query->where('name','like','%'.$request->name.'%');
        }
        $celebrities = $query->paginate(6);

        return view('client.celebrity.index',compact('celebrities'));
    }

    public function view($slug)
    {
        $celebrity = Celebrity::where('slug','=',$slug)->first();
        $limitMovies = DB::table('persons')
                            ->where('movie_casts.person_id','=',$celebrity->id)
                            ->join('movie_casts','persons.id','=','movie_casts.movie_id')
                            ->join('movies','movie_casts.movie_id','=','movies.id')
                            ->get('movies.*')->take(5)
                            ;
        $fullMovies = $celebrity->casts;

        $photoAlbums = $celebrity->images;
        return view('client.celebrity.view',compact('celebrity','fullMovies','limitMovies','photoAlbums'));
    }

    public function fullFilmography()
    {
        
    }
}
