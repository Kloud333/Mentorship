<?php

namespace tests\Unit;

use app\src\Models\Movie;

class MovieClassTest extends Base
{

    /**
     * @throws \Exception
     * @covers \app\src\Models\Movie
     */
    public function testMovieAttributeTitleExist()
    {
        $this->assertClassHasAttribute('title', Movie::class);
    }

    /**
     * @throws \Exception
     * @covers \app\src\Models\Movie
     */
    public function testMovieAttributePosterExist()
    {
        $this->assertClassHasAttribute('poster', Movie::class);
    }

    /**
     * @throws \Exception
     * @covers \app\src\Models\Movie
     */
    public function testMovieAttributeDescriptionExist()
    {
        $this->assertClassHasAttribute('description', Movie::class);
    }


//    Додати дата провайдер з хорошими і поганими даними




    /**
     * @throws \Exception
     * @covers \app\src\Models\Movie::setTitle
     * @covers \app\src\Models\Movie::getTitle
     */
    public function testMovieMethodTitle()
    {
        $movie_title = 'title';
        $movie = new Movie();

        $movie->setTitle($movie_title);
        $this->assertEquals($movie_title, $movie->getTitle());
    }

    /**
     * @throws \Exception
     * @covers \app\src\Models\Movie::setPoster
     * @covers \app\src\Models\Movie::getPoster
     */
    public function testMovieMethodPoster()
    {
        $movie_poster = 'http...';
        $movie = new Movie();

        $movie->setPoster($movie_poster);
        $this->assertEquals($movie_poster, $movie->getPoster());
    }

    /**
     * @throws \Exception
     * @covers \app\src\Models\Movie::setDescription
     * @covers \app\src\Models\Movie::getDescription
     */
    public function testMovieMethodDescription()
    {
        $movie_description = 'description';
        $movie = new Movie();


        $movie->setDescription($movie_description);
        $this->assertEquals($movie_description, $movie->getDescription());
    }

}