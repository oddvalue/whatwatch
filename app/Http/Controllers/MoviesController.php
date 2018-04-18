<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Movies\MovieRepository;
use App\Search\SearchRepository;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    /**
     * Movies homepage
     * @param  Request         $request
     * @param  MovieRepository $repo
     * @return view
     */
    public function index(Request $request, MovieRepository $repo)
    {
        return $this->upcoming($request, $repo);
    }

    /**
     * Upcoming movies
     * @param  Request         $request
     * @param  MovieRepository $repo
     * @return view
     */
    public function upcoming(Request $request, MovieRepository $repo)
    {
        $movies = $repo->upcoming($request->get('page'));
        return view('movies', compact('movies'));
    }

    /**
     * Top rated movies
     * @param  Request         $request
     * @param  MovieRepository $repo
     * @return view
     */
    public function topRated(Request $request, MovieRepository $repo)
    {
        $movies = $repo->topRated($request->get('page'));
        return view('movies', compact('movies'));
    }

    /**
     * Search movies
     * @param  Request          $request
     * @param  SearchRepository $repo
     * @return view
     */
    public function search(Request $request, SearchRepository $repo)
    {
        $movies = $repo->searchMovie($request->get('q'), $request->get('page'));
        return view('movies', compact('movies'));
    }
}