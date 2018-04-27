<?php

namespace App\Movies;

interface MovieTransformerInterface
{
    /**
     * @param mixed $original
     */
    public function __construct($original);

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @return string
     */
    public function getSynopsis();

    /**
     * @return string
     */
    public function getYear();

    /**
     * @return string
     */
    public function getPosterUrl();
}
