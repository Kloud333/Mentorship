<?php

namespace app\src\Transporters;

interface TransportAdapter
{
    /**
     * @param $url
     * @return mixed
     */
    public function get($url);
}