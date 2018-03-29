<?php

namespace tests\Unit;

use app\src\Models\Movie;
use app\src\Parsers\FilmixParserStrategy;
use app\src\Parsers\KinokradDomCrawlerParserAdapter;

class ParsersTest extends Base
{

    /**
     * @return array
     */
    public function filmixDataProvider()
    {
        return [
            ['<h1 class="name" itemprop="name">title</h1> <img src="https..." class="poster poster-tooltip" itemprop="image" /> <div class="full-story">description</div><div']
        ];
    }

    /**
     * @return array
     */
    public function kinokradDataProvider()
    {
        return [
            ['<div class="fallsttitle"><h1 itemprop="name">title</h1></div><div class="bigposter"> <img title="" alt="" src="https..." itemprop=""></div><div class="fulltext" id="fulltext" itemprop="description">description</div>']
        ];
    }

    /**
     * @dataProvider filmixDataProvider
     * @covers       \app\src\Parsers\FilmixParserStrategy::parse
     */
    public function testFilmixParserGoodResult($data)
    {
        $scrapper = new FilmixParserStrategy();

        $result = $scrapper->parse($data);

        $this->assertEquals($result->getTitle(), 'title');
        $this->assertEquals($result->getPoster(), 'https...');
        $this->assertEquals($result->getDescription(), 'description');
    }

    /**
     * @throws \Exception
     * @covers \app\src\Parsers\FilmixParserStrategy::parse
     */
    public function testFilmixParserGoodResultClass()
    {
        $scrapper = new FilmixParserStrategy();
        $result = $scrapper->parse('some_data');

        $this->assertInstanceOf(Movie::class, $result);
    }

    /**
     * @dataProvider kinokradDataProvider
     * @covers       \app\src\Parsers\KinokradDomCrawlerParserAdapter::parse
     */
    public function testKinokradParserGoodResult($data)
    {
        $scrapper = new KinokradDomCrawlerParserAdapter();

        $result = $scrapper->parse($data);

        $this->assertEquals($result->getTitle(), 'title');
        $this->assertEquals($result->getPoster(), 'https...');
        $this->assertEquals($result->getDescription(), 'description');
    }

    /**
     * @covers \app\src\Parsers\KinokradDomCrawlerParserAdapter::parse
     * @expectedException \InvalidArgumentException
     */
    public function testKinokradParserGoodResultClass()
    {
        $scrapper = new KinokradDomCrawlerParserAdapter();
        $scrapper->parse('');
    }


}