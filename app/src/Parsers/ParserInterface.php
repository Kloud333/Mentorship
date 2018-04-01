<?php

namespace app\src\Parsers;

use app\src\Models\Movie;

interface ParserInterface
{
    /**
     * @param $siteContent
     * @return mixed
     */
    public function parse(string $siteContent): Movie;
}