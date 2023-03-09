<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('user.index');
    }
    public function movie()
    {
        return view('user.movie.index');
    }
}
