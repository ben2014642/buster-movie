<?php

namespace App\Http\Controllers;

use App\Models\Celebrity;
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
        $movies = Movie::paginate(10);
        $genres = Genre::all();
        $years = DB::table('movies')
            ->selectRaw('DISTINCT YEAR(release_date) as year')
            ->orderBy('year', 'asc')
            ->get()->pluck('year');
        $movies->totalMovie = $movies->count();
        return view('client.movie.index', compact('movies', 'genres', 'years'));
    }

    public function view_movie($slug)
    {
        $movie = Movie::where('slug', $slug)->first();
        $userStar = 0;
        if (Auth::check()) {
            $userStar = DB::table('movie_rates')
                ->where([
                    ['movie_id', '=', $movie->id],
                    ['user_id', '=', Auth::user()->id]
                ])
                ->first();
        }
        if ($userStar) {
            $userStar = $userStar->star;
        }
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
        if ($request->option_search == 'movie') {
            $query = Movie::where('title', 'like', '%' . $request->value . '%');
            $movies = $query->get();
            return view('client.movie.search', compact('movies',));
        } else {
            $query = Celebrity::where('name', 'like', '%' . $request->value . '%');
            $celebrities = $query->paginate(6);
            return view('client.celebrity.index', compact('celebrities'));

        }
    }
}
