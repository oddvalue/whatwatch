<?php

namespace App\Movies;

class TmbdMovieTransformer extends Movie implements MovieTransformerInterface
{
    private $original;

    /**
     * @param  $original
     * @return App\Movies\Movie
     */
    public function __construct($original)
    {
        $this->original = $original;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->original->getTitle();
    }

    /**
     * @return string
     */
    public function getSynopsis()
    {
        return $this->original->getOverview();
    }

    /**
     * @return string
     */
    public function getYear()
    {
        return $this->original->getReleaseDate()->format('Y');
    }

    /**
     * @return string
     */
    public function getPosterUrl()
    {
        if ( ! $this->original->getPosterPath()) {
            return asset('images/no-image.png');
        }
        return "https://image.tmdb.org/t/p/w500{$this->original->getPosterPath()}";
    }
}
