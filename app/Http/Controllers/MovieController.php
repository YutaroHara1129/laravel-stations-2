<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('movies', ['movies' => $movies]);
    }

    public function getMovies()
    {
        $movies = Movie::all();
        return view('admin.movies', ['movies' => $movies]);
    }
}