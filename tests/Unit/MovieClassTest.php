<?php

namespace tests\Unit;

use app\src\Models\Movie;

class MovieClassTest extends Base
{

    public function testMovieAttributeTitleExist()
    {
        $this->assertClassHasAttribute('title', Movie::class);
    }

    public function testMovieAttributePosterExist()
    {
        $this->assertClassHasAttribute('poster', Movie::class);
    }

    public function testMovieAttributeDescriptionExist()
    {
        $this->assertClassHasAttribute('description', Movie::class);
    }

    public function testMovieMethodTitle()
    {
        $movie_title = 'title';
        $movie = new Movie();

        $movie->setTitle($movie_title);
        $this->assertEquals($movie_title, $movie->getTitle());
    }

    public function testMovieMethodPoster()
    {
        $movie_poster = 'http...';
        $movie = new Movie();

        $movie->setPoster($movie_poster);
        $this->assertEquals($movie_poster, $movie->getPoster());
    }

    public function testMovieMethodDescription()
    {
        $movie_description = 'description';
        $movie = new Movie();

        $movie->setDescription($movie_description);
        $this->assertEquals($movie_description, $movie->getDescription());
    }

}