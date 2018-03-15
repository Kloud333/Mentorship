<?php

namespace app\src\Parsers;

use app\src\Models\Movie;

interface ParserAdapterInterface
{
    /**
     * @param $siteContent
     * @return mixed
     */
    public function parse($siteContent): Movie;
}