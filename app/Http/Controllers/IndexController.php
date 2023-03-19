<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        // dd(Auth::user()->name);
        return view('client.index');
    }
    public function movie()
    {
        $movies = Movie::all();
        $genres = Genre::all();
        $years = DB::table('movies')
            ->selectRaw('DISTINCT YEAR(release_date) as year')
            ->orderBy('year', 'asc')
            ->get()->pluck('year');

        return view('client.movie.index', compact('movies', 'genres', 'years'));
    }

    public function view_movie($slug)
    {
        $movie = Movie::where('slug', $slug)->first();
        $userStar = DB::table('movie_rates')
            ->where([
                ['movie_id', '=', $movie->id],
                ['user_id', '=', Auth::user()->id]
            ])
            ->first() ?? 0;
        $totalCmt = Comment::getTotalComment($movie->id);
        return view('client.movie.view', compact('movie', 'userStar', 'totalCmt'));
    }

    public function rateMovie($id, $star)
    {

        if ($star < 0 || $star > 5) {
            return response([
                'status' => 'error',
                'msg' => 'Đánh giá không hợp lệ'
            ]);
        }
        if (!Auth::check()) {
            return response([
                'status' => 'error',
                'msg' => 'Bạn phải đăng nhập để sử dụng chức năng này !'
            ]);
        } else {
            $u_id = Auth::user()->id;
        }

        $rate = DB::table('movie_rates')
            ->where([
                ['movie_id', '=', $id],
                ['user_id', '=', $u_id]
            ])
            ->first();
        if (!empty($rate)) {
            return response([
                'status' => 'error',
                'msg' => 'Bạn đã đánh giá phim này rồi !'
            ]);
        }
        DB::table('movie_rates')->insert([
            'movie_id' => $id,
            'user_id' => $u_id,
            'star' => $star
        ]);
        $avgStar = DB::table('movie_rates')
            ->select(DB::raw('AVG(star) AS avg'))
            ->where('movie_id', '=', $id)
            ->first();
        $movie = Movie::where('id', $id)->first();
        $movie->votes_count += 1;
        $movie->votes_avg = $avgStar->avg;
        $movie->save();


        return response([
            'status' => 'success',
            'msg' => 'Đánh giá thành công!'
        ]);
    }

    public function search(Request $request)
    {
        $query = Movie::query();

        // Tìm kiếm theo tên phim
        if ($request->movie_name != null) {
            dd(1);
            $query->where('title', 'like', '%' . $request->input('movie_name') . '%');
        }

        // Tìm kiếm theo thể loại
        if ($request->has('genres')) {
            // dd(0);
            $query->join('movie_genres', 'movie_genres.movie_id', '=', 'movies.id')
            ->join('genres', 'movie_genres.genre_id', '=', 'genres.id')
            ->whereIn('genres.id',$request->genres);
        }

        // Tìm kiếm theo năm
        if ($request->fromYear != 'no-data' && $request->toYear != 'no-data') {
            $query->whereBetween(DB::raw('YEAR(release_date)'),[$request->fromYear, $request->toYear]);
        }

        $movies = $query->paginate(10);
        dd($movies);

        return view('client.movie.search', compact('movies'));
    }
}
