<?php 

namespace App\Movies;

class TmbdMovieTransformer implements MovieTransformerInterface
{
    /**
     * @param  $original
     * @return App\Movies\Movie
     */
    public function transform($original)
    {
        return new Movie([
            'title' => $this->getTitle($original),
            'synopsis' => $this->getSynopsis($original),
            'year' => $this->getYear($original),
            'poster' => $this->getPosterUrl($original),
        ]);
    }

    /**
     * @param  $original
     * @return string
     */
    public function getTitle($original)
    {
        return $original->getTitle();
    }

    /**
     * @param  $original
     * @return string
     */
    public function getSynopsis($original)
    {
        return $original->getOverview();
    }

    /**
     * @param  $original
     * @return string
     */
    public function getYear($original)
    {
        return $original->getReleaseDate()->format('Y');
    }

    /**
     * @param  $original
     * @return string
     */
    public function getPosterUrl($original)
    {
        return "https://image.tmdb.org/t/p/w500{$original->getPosterPath()}";
    }
}