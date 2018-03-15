<?php

namespace app\src\Transporters;

interface TransportAdapterInterface
{
    /**
     * @param $url
     * @return mixed
     */
    public function get($url);
}