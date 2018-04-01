<?php

namespace tests\Unit;

use app\src\Parsers\FilmixParserStrategy;
use app\src\Parsers\KinokradDomCrawlerParserAdapter;

class ParsersTest extends Base
{

    /**
     * @return array
     */
    public function goodFilmixDataProvider()
    {
        return [
            ['<h1 class="name" itemprop="name">title</h1> <img src="https..." class="poster poster-tooltip" itemprop="image" /> <div class="full-story">description</div><div']
        ];
    }

    /**
     * @return array
     */
    public function badFilmixDataProvider()
    {
        return [
            [5],
            [null]
        ];
    }

    /**
     * @return array
     */
    public function goodKinokradDataProvider()
    {
        return [
            ['<div class="fallsttitle"><h1 itemprop="name">title</h1></div><div class="bigposter"> <img title="" alt="" src="https..." itemprop=""></div><div class="fulltext" id="fulltext" itemprop="description">description</div>']
        ];
    }

    /**
     * @return array
     */
    public function badKinokradDataProvider()
    {
        return [
            [5],
            [null]
        ];
    }

    /**
     * @dataProvider goodFilmixDataProvider
     * @covers       \app\src\Parsers\FilmixParserStrategy::parse
     * @param $data
     */
    public function testGoodResultFilmixParser($data)
    {
        $scrapper = new FilmixParserStrategy();

        $result = $scrapper->parse($data);

        $this->assertEquals('title', $result->getTitle());
        $this->assertEquals('https...', $result->getPoster());
        $this->assertEquals('description', $result->getDescription());
    }

    /**
     * @dataProvider badFilmixDataProvider
     * @covers \app\src\Parsers\FilmixParserStrategy::parse
     * @param $data
     */
    public function testBadResultFilmixParser($data)
    {
        $scrapper = new FilmixParserStrategy();

//        $scrapper->parse($data);

        $this->markTestIncomplete();
    }

    /**
     * @dataProvider goodKinokradDataProvider
     * @covers \app\src\Parsers\KinokradDomCrawlerParserAdapter::parse
     * @param $data
     */
    public function testGoodResultKinokradParser($data)
    {
        $scrapper = new KinokradDomCrawlerParserAdapter();

        $result = $scrapper->parse($data);

        $this->assertEquals('title', $result->getTitle());
        $this->assertEquals('https...', $result->getPoster());
        $this->assertEquals('description', $result->getDescription());
    }

    /**
     * @dataProvider badKinokradDataProvider
     * @covers \app\src\Parsers\KinokradDomCrawlerParserAdapter::parse
     * @param $data
     * @expectedException \InvalidArgumentException
     */
    public function testBadResultKinokradParser($data)
    {
        $scrapper = new KinokradDomCrawlerParserAdapter();

//        $scrapper->parse($data);

        $this->markTestIncomplete();
    }

}