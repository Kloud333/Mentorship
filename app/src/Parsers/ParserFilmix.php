<?php

namespace app\src\Parsers;


use app\src\Models\Movie;

class ParserFilmix implements ParserInterface
{
    /**
     * @param $siteContent
     * @return Movie
     */
    public function parse($siteContent): Movie
    {
        preg_match_all('#<h1 class="name" itemprop="name">(.*)</h1>#', $siteContent, $content_title);
        preg_match_all('#<img src="(.*) class="poster poster-tooltip" itemprop="image"#', $siteContent, $content_poster);
        preg_match_all('#<div class="full-story">(.*)</div><div#', $siteContent, $content_description);

        $title = iconv("windows-1251", "utf-8", $content_title[1][0]);
        $poster = iconv("windows-1251", "utf-8", $content_poster[1][0]);
        $description = iconv("windows-1251", "utf-8", $content_description[1][0]);

        $movie = new Movie();

        $movie->title = $title;
        $movie->poster = $poster;
        $movie->description = $description;

        return $movie;

    }
}