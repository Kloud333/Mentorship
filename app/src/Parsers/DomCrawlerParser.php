<?php

namespace app\src\Parsers;

use app\src\Models\Movie;
use Symfony\Component\DomCrawler\Crawler;

class DomCrawlerParser implements ParserInterface
{
    /**
     * @param $siteContent
     * @return Movie
     */
    public function parse($siteContent): Movie
    {
        $crawler = new Crawler($siteContent);

        $movie_title = $crawler->filter('h1.name')->text();
        $movie_poster = $crawler->filter('img.poster')->attr('src');
        $movie_description = $crawler->filter('div.full-story')->text();

        $movie = new Movie();

        $movie->title = $movie_title;
        $movie->poster = $movie_poster;
        $movie->description = $movie_description;

        return $movie;
    }
}