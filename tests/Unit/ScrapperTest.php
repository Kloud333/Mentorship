<?php

namespace tests\Unit;

use app\src\Models\Movie;
use app\src\Scrapper;

class ScrapperTest extends Base
{

    /**
     * @return array
     */
    public function goodDataFilmixProvider()
    {
        return [
            ['<h1 class="name" itemprop="name">title</h1> <img src="https..." class="poster poster-tooltip" itemprop="image" /> <div class="full-story">description</div><div']
        ];
    }

    /**
     * @return array
     */
    public function badDataFilmixProvider()
    {
        return [
            [1],
            [null]
        ];
    }

    /**
     * @dataProvider goodDataFilmixProvider
     * @param $data
     * @covers \app\src\Scrapper::get
     * @covers \app\src\Scrapper::__construct
     */
    public function testGoodDataFilmixScrapper($data)
    {

        $StrategyMock = $this->getMockBuilder('app\src\Transporters\CurlStrategy')
            ->setMethods(['get'])
            ->getMock();

        $StrategyMock->expects($this->any())
            ->method('get')
            ->will($this->returnValue($data));

        $ParserMock = $this->getMockBuilder('app\src\Parsers\FilmixParserStrategy')
            ->setMethods(['parse'])
            ->getMock();

        $ParserMock->expects($this->any())
            ->method('parse')
            ->will($this->returnCallback(function ($data) {
                $movie = new Movie();
                return $movie->setTitle(substr($data, 33, 5));
            }));

        $scrapper = new Scrapper($StrategyMock, $ParserMock);

        $this->assertEquals('title', $scrapper->get($data)->getTitle());
    }

}