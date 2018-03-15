<?php

namespace app\src;

use app\src\Parsers\KinokradDomCrawlerParserAdapter;
use app\src\Parsers\FilmixParserAdapter;
use app\src\Transporters\CurlAdapter;
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
                return new Scrapper(new CurlAdapter(), new FilmixParserAdapter());
            case 'kinokrad':
                return new Scrapper(new GuzzleAdapter(), new KinokradDomCrawlerParserAdapter());
            default:
                throw new Exception('Resource not found!');
        }
    }
}