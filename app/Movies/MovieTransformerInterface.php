<?php 

namespace App\Movies;

interface MovieTransformerInterface
{
    /**
     * @param  $original
     * @return App\Movies\Movie
     */
    public function transform($original);
    
    /**
     * @param  $original
     * @return string
     */
    public function getTitle($original);

    /**
     * @param  $original
     * @return string
     */
    public function getSynopsis($original);

    /**
     * @param  $original
     * @return string
     */
    public function getYear($original);

    /**
     * @param  $original
     * @return string
     */
    public function getPosterUrl($original);
}