<?php

namespace app\src\Transporters;

interface TransportInterface
{
    /**
     * @param $url
     * @return mixed
     */
    public function get($url);
}