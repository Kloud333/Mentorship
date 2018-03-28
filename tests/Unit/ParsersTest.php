<?php

namespace tests\Unit;

use app\src\Models\Movie;
use app\src\Parsers\FilmixParserStrategy;
use app\src\Parsers\KinokradDomCrawlerParserAdapter;

class ParsersTest extends Base
{

    public function filmixDataProvider()
    {
        return [
            ['<h1 class="name" itemprop="name">title</h1> <img src="https..." class="poster poster-tooltip" itemprop="image" /> <div class="full-story">description</div><div']
        ];
    }

    public function kinokradDataProvider()
    {
        return [
            ['<div class="fallsttitle"><h1 itemprop="name">title</h1></div><div class="bigposter"> <img title="" alt="" src="https..." itemprop=""></div><div class="fulltext" id="fulltext" itemprop="description">description</div>']
        ];
    }

    /**
     * @dataProvider filmixDataProvider
     */
    public function testFilmixParserGoodResult($data)
    {
        $scrapper = new FilmixParserStrategy();

        $result = $scrapper->parse($data);

        $this->assertEquals($result->getTitle(), 'title');
        $this->assertEquals($result->getPoster(), 'https...');
        $this->assertEquals($result->getDescription(), 'description');
    }

    public function testFilmixParserGoodResultClass()
    {
        $scrapper = new FilmixParserStrategy();
        $result = $scrapper->parse('');

        $this->assertInstanceOf(Movie::class, $result);
    }

    /**
     * @dataProvider kinokradDataProvider
     */
    public function testKinokradParserGoodResult($data)
    {
        $scrapper = new KinokradDomCrawlerParserAdapter();

        $result = $scrapper->parse($data);

        $this->assertEquals($result->getTitle(), 'title');
        $this->assertEquals($result->getPoster(), 'https...');
        $this->assertEquals($result->getDescription(), 'description');
    }

    public function testKinokradParserGoodResultClass()
    {
        $scrapper = new KinokradDomCrawlerParserAdapter();

        $this->expectException(\InvalidArgumentException::class);
        $result = $scrapper->parse('');
    }


}