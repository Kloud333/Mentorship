<?php

namespace app\src\Parsers;

use app\src\Models\Movie;

class FilmixParserStrategy implements ParserInterface
{
    /**
     * @param $siteContent
     * @return Movie
     */
    public function parse(string $siteContent): Movie
    {
        preg_match_all('#<h1 class="name" itemprop="name">(.*)</h1>#', $siteContent, $parsed_title);
        preg_match_all('#<img src="(.*)" class="poster poster-tooltip" itemprop="image"#', $siteContent, $parsed_poster);
        preg_match_all('#<div class="full-story">(.*)</div><div#', $siteContent, $parsed_description);

        $movie_title = iconv("windows-1251", "utf-8", $parsed_title[1][0]);
        $movie_poster = iconv("windows-1251", "utf-8", $parsed_poster[1][0]);
        $movie_description = iconv("windows-1251", "utf-8", $parsed_description[1][0]);

        $movie = (new Movie())
            ->setTitle($movie_title)
            ->setPoster($movie_poster)
            ->setDescription($movie_description);

        return $movie;
    }
}