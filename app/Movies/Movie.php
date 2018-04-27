<?php

namespace App\Movies;

use Illuminate\Support\Fluent;

class Movie extends Fluent
{
    public function __construct(MovieTransformerInterface $transformer)
    {
        parent::__construct([
            'title' => $transformer->getTitle(),
            'synopsis' => $transformer->getSynopsis(),
            'year' => $transformer->getYear(),
            'poster' => $transformer->getPosterUrl(),
        ]);
    }
}
