<?php

namespace App\Http\Controllers;

use App\Models\ImageUpload;
use App\Models\Movie;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();
        return view('admin.movie.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.movie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|max:100',
            'slug' => 'required',
            'thumbnail' => 'required',
            'description' => 'required',
            'release_date' => 'required',
            'revenue' => 'required',
            'status' => 'required',
        ]);
        $thumbnail = $request->file('thumbnail')->store('public/movie');
        $validated['thumbnail'] = $thumbnail;

        $movie = Movie::create($validated);
        $arrImage = $request->file('files');

        $imageData = [];
        foreach ($arrImage as $image) {
            $uploadedFileUrl = Cloudinary::upload($image->getRealPath())->getSecurePath();
            $imageData[] = [
                'movie_id' => $movie->id,
                'url' => $uploadedFileUrl
            ];
        }

        ImageUpload::insert($imageData);

        return redirect()->route('admin.movie.index')->with('success', 'Created Successfull !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        // return $movie;
    }

    public function edit(Movie $movie)
    {

        return view('admin.movie.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $movie->fill($request->all());
        $image = $movie->thumbnail;
        if ($request->hasFile('thumbnail')) {
            Storage::delete($movie->image);
            $image = $request->file('thumbnail')->store('public/movie');
        }
        $movie->thumbnail = $image;
        $movie->save();

        return back()->with('success', 'Updated Successfull !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        if ($movie->thumbnail) {
            Storage::delete($movie->thumbnail);
        }
        $movie->delete();
        return back()->with('success', 'Deleted Successfull !');
    }

    public function search(Request $request)
    {
        $query = Movie::query();

        // Tìm kiếm theo tên phim
        if ($request->movie_name != null) {
            $query->where('title', 'like', '%' . $request->input('movie_name') . '%');
        }

        // Tìm kiếm theo thể loại
        if ($request->has('genres')) {
            // dd(0);
            $query->join('movie_genres', 'movie_genres.movie_id', '=', 'movies.id')
                ->join('genres', 'movie_genres.genre_id', '=', 'genres.id')
                ->whereIn('genres.id', $request->genres);
        }

        // Tìm kiếm theo năm
        if ($request->fromYear != 'no-data' && $request->toYear != 'no-data') {
            $query->whereBetween(DB::raw('YEAR(release_date)'), [$request->fromYear, $request->toYear]);
        }

        $movies = $query->get();
        // $totalMovieOfSearch = $movies->count();
        // dd($movies->count());
        return view('client.movie.search', compact('movies',));
    }
}
