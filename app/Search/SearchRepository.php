<?php

namespace App\Search;

use App\Movies\TmbdMovieTransformer;
use Illuminate\Pagination\LengthAwarePaginator;
use Tmdb\ApiToken;
use Tmdb\Client;
use Tmdb\Model\Search\SearchQuery\MovieSearchQuery;
use Tmdb\Repository\SearchRepository as TmdbRepository;

class SearchRepository
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
     * @param  $page int
     * @return Illuminate\Pagination\LengthAwarePaginator 
     */
    public function searchMovie($query, $page)
    {
        $result = $this->tmdbRepo->searchMovie($query, new MovieSearchQuery(['page' => $page ?: 1]));
        return new LengthAwarePaginator($result->map(function($kwy, $movie) {
            return $this->transformer->transform($movie);
        }), $result->getTotalPages(), 20, $page);
    }
}