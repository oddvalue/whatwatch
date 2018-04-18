<?php

namespace App\Movies;

use Illuminate\Pagination\LengthAwarePaginator;
use Tmdb\ApiToken;
use Tmdb\Client;
use Tmdb\Repository\MovieRepository as TmdbRepository;

class MovieRepository
{
    /**
     * Tmdb\Repository\MovieRepository
     * @access private
     */
    private $tmdbRepo;

    /**
     * App\Movies\TmbdMovieTransformer
     * @access private
     */
    private $transformer;
    
    function __construct()
    {
        $token  = new ApiToken(config('movies.tmdb_api_key'));
        $client = new Client($token);
        $this->tmdbRepo = new TmdbRepository($client);

        $this->transformer = new TmbdMovieTransformer;
    }

    /**
     * @param  int $page
     * @return Illuminate\Pagination\LengthAwarePaginator 
     */
    public function topRated($page = null)
    {
        $result = $this->tmdbRepo->getPopular(['page' => $page ?: 1]);
        return $this->paginate($result, $page);
    }

    /**
     * @param  int $page
     * @return Illuminate\Pagination\LengthAwarePaginator 
     */
    public function upcoming($page = null)
    {
        $result = $this->tmdbRepo->getUpcoming(['page' => $page ?: 1]);
        return $this->paginate($result, $page);
    }

    /**
     * @param  Tmdb\Model\Collection\ResultCollection $result
     * @param  int $page
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    protected function paginate($result, $page)
    {
        return new LengthAwarePaginator($result->map(function($kwy, $movie) {
            return $this->transformer->transform($movie);
        }), $result->getTotalPages(), 20, $page, ['path' => request()->path(), 'query' => request()->input()]);
    }
}