<?php

namespace App\Search;

use Tmdb\Client;
use Tmdb\ApiToken;
use App\Movies\Movie;
use App\Movies\TmbdMovieTransformer;
use Illuminate\Pagination\LengthAwarePaginator;
use Tmdb\Model\Search\SearchQuery\MovieSearchQuery;
use Tmdb\Repository\SearchRepository as TmdbRepository;

class SearchRepository
{
    /**
     * Tmdb\Repository\MovieRepository
     * @access private
     */
    private $tmdbRepo;

    function __construct()
    {
        $token  = new ApiToken(config('movies.tmdb_api_key'));
        $client = new Client($token);
        $this->tmdbRepo = new TmdbRepository($client);
    }

    /**
     * @param  $page int
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function searchMovie($query, $page)
    {
        $result = $this->tmdbRepo->searchMovie($query, new MovieSearchQuery(['page' => $page ?: 1]));
        return new LengthAwarePaginator(collect($result->map(function($kwy, $movie) {
            return new Movie(new TmbdMovieTransformer($movie));
        })->toArray())->values(), $result->getTotalPages(), 20, $page, ['path' => 'search']);
    }
}
