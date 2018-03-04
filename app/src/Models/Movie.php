<?php

namespace app\src\Models;

class Movie
{
    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $poster;
    /**
     * @var string
     */
    private $description;

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

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getPoster(): string
    {
        return $this->poster;
    }

    /**
     * @param string $poster
     */
    public function setPoster(string $poster)
    {
        $this->poster = $poster;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

}