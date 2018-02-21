<?php

namespace app\src\Parsers;

interface ParserInterface
{
    /**
     * @param $data
     * @return mixed
     */
    public function parse($data);
}