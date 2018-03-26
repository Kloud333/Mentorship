<?php

namespace tests\Unit;

use app\src\Models\Movie;
use app\src\Parsers\FilmixParserStrategy;

class ParsersTest extends Base
{

    public function testFilmixParser()
    {
        $scrapper = new FilmixParserStrategy();

        $data = '<h1 class="name" itemprop="name">titke</h1> <img src="https://filmix.me/uploads/posters/thumbs/w220/discovery-ulichnye-gonki_104350_0.jpg" class="poster poster-tooltip" itemprop="image" /> <div class="full-story">decsription</div>';

        $result = $scrapper->parse($data);

        $this->assertFalse(empty($result->getTitle()));
    }

    public function testFilmixParserGoodResultClass()
    {
        $scrapper = new FilmixParserStrategy();
        $result = $scrapper->parse('');

        $this->assertInstanceOf(Movie::class, $result);
    }

}