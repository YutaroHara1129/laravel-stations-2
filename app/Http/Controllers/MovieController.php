<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{

    public function __construct()
    {
        $this->movie = new Movie();
    }

    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $is_showing = $request->input('is_showing');
        
        $query = $this->movie::query();

        if ($keyword !== null) {
            $query->where(function($q) use ($keyword) {
                $q->where('title', 'LIKE', "%{$keyword}%")
                  ->orWhere('description', 'LIKE', "%{$keyword}%");
            });
        }

        if ($is_showing !== null) {
            $query->where('is_showing', $is_showing);
        }
        
        $movies = $query->paginate(20);

        return view('movies', compact('movies', 'keyword', 'is_showing'));
    }

    public function getMovies()
    {
        $movies = $this->movie::all();
        return view('admin.movies', ['movies' => $movies]);
    }

    public function getCreateMovie()
    {
        return view('admin.createMovie');
    }

    public function getEditMovie($id)
    {
        $movie = $this->movie::find($id);

        return view('admin.editMovie', ['movie' => $movie]);
    }

    public function storeMovie(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:movies,title',
            'image_url' => 'required|url',
            'published_year' => 'required|integer',
            'is_showing' => 'required|boolean',
            'description' => 'required|string'
        ]);

        $this->movie->registerMovie($request);
        return redirect()->route('movies.index');
    }

    public function updateMovie(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:movies,title,' . $id,
            'image_url' => 'required|url',
            'published_year' => 'required|integer',
            'is_showing' => 'required|boolean',
            'description' => 'required|string'
        ]);

        $this->movie->updateMovie($request, $id);
        return redirect()->route('movies.index');
    }

    public function destroyMovie($id)
    {
        if ($this->movie::find($id) === null) {
            # 404レスポンスを返す
            abort(404);
            return redirect()->route('movies.index');
        }
        $this->movie::destroy($id);
        return redirect()->route('movies.index');
    }
}