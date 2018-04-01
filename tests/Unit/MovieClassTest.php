<?php

namespace tests\Unit;

use app\src\Models\Movie;

class MovieClassTest extends Base
{
    /**
     * @return array
     */
    public function goodMovieDataProvider()
    {
        return [
            ['some data'],
            ['']
        ];
    }

    /**
     * @return array
     */
    public function badMovieDataProvider()
    {
        return [
            [null],
            [[]],
            [5]
        ];
    }

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

    /**
     * @dataProvider goodMovieDataProvider
     * @param $data
     * @covers \app\src\Models\Movie::setTitle
     * @covers \app\src\Models\Movie::getTitle
     */
    public function testGoodDataMovieTitle($data)
    {
        $movie = new Movie();

        $movie->setTitle($data);
        $this->assertEquals($data, $movie->getTitle());
    }

    /**
     * @dataProvider badMovieDataProvider
     * @param $data
     * @covers \app\src\Models\Movie::setTitle
     * @covers \app\src\Models\Movie::getTitle
    //     * @expectedException TypeError - як похендлити
     */
    public function testBadDataMovieTitle($data)
    {
        $movie = new Movie();

//        $movie->setTitle($data);
//        $this->assertEquals($data, $movie->getTitle());

        $this->markTestIncomplete();
    }

    /**
     * @dataProvider goodMovieDataProvider
     * @param $data
     * @covers \app\src\Models\Movie::setPoster
     * @covers \app\src\Models\Movie::getPoster
     */
    public function testGoodDataMoviePoster($data)
    {
        $movie = new Movie();

        $movie->setPoster($data);
        $this->assertEquals($data, $movie->getPoster());
    }

    /**
     * @dataProvider badMovieDataProvider
     * @param $data
     * @covers  \app\src\Models\Movie::setPoster
     * @covers  \app\src\Models\Movie::getPoster
     */
    public function testBadDataMoviePoster($data)
    {
        $movie = new Movie();

//        $movie->setPoster($data);
//        $this->assertEquals($data, $movie->getPoster());

        $this->markTestIncomplete();
    }

    /**
     * @dataProvider goodMovieDataProvider
     * @param $data
     * @covers \app\src\Models\Movie::setDescription
     * @covers \app\src\Models\Movie::getDescription
     */
    public function testGoodDataMovieDescription($data)
    {
        $movie = new Movie();

        $movie->setDescription($data);
        $this->assertEquals($data, $movie->getDescription());
    }

    /**
     * @dataProvider badMovieDataProvider
     * @param $data
     * @covers \app\src\Models\Movie::setDescription
     * @covers \app\src\Models\Movie::getDescription
     */
    public function testBadDataMovieDescription($data)
    {
        $movie = new Movie();

//        $movie->setDescription($data);
//        $this->assertEquals($data, $movie->getDescription());

        $this->markTestIncomplete();
    }

}