<?php

namespace app\src\Parsers;

use app\src\Models\Movie;
use Symfony\Component\DomCrawler\Crawler;

class KinokradDomCrawlerParserAdapter implements ParserInterface
{
    /**
     * @param $siteContent
     * @return Movie
     */
    public function parse($siteContent): Movie
    {
        $crawler = new Crawler($siteContent);

        $movie_title = $crawler->filter('.fallsttitle h1')->text();
        $movie_poster = $crawler->filter('.bigposter img')->attr('src');
        $movie_description = $crawler->filter('div.fulltext')->text();

        $movie = (new Movie())
            ->setTitle($movie_title)
            ->setPoster($movie_poster)
            ->setDescription($movie_description);

        return $movie;
    }
}