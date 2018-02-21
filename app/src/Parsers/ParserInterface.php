<?php

namespace app\src\Parsers;

interface ParserInterface
{
    /**
     * @param $siteContent
     * @return mixed
     */
    public function parse($siteContent);
}