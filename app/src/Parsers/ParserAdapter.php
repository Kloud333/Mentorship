<?php

namespace app\src\Parsers;

use app\src\Models\Movie;

interface ParserAdapter
{
    /**
     * @param $siteContent
     * @return mixed
     */
    public function parse($siteContent) :Movie ;
}