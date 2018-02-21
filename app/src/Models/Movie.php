<?php

namespace app\src\Models;

class Movie
{
    /**
     * @var string
     */
    public $title;
    /**
     * @var string
     */
    public $poster;
    /**
     * @var string
     */
    public $description;

    /**
     * Movie constructor.
     * @param string $title
     * @param string $poster
     * @param string $description
     */
    public function __construct($title = 'not yet', $poster = 'not yet', $description = 'not yet')
    {
        $this->title = $title;
        $this->poster = $poster;
        $this->description = $description;
    }

}