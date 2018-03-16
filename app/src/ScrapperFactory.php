<?php

namespace app\src;

use app\src\Parsers\KinokradDomCrawlerParserAdapter;
use app\src\Parsers\FilmixParserStrategy;
use app\src\Transporters\CurlStrategy;
use app\src\Transporters\GuzzleAdapter;
use Exception;

class ScrapperFactory
{
    /**
     * @param $domain
     * @return Scrapper
     * @throws Exception
     */
    public function create($domain)
    {
        switch ($domain) {
            case 'filmix':
                return new Scrapper(new CurlStrategy(), new FilmixParserStrategy());
            case 'kinokrad':
                return new Scrapper(new GuzzleAdapter(), new KinokradDomCrawlerParserAdapter());
            default:
                throw new Exception('Resource not found!');
        }
    }
}