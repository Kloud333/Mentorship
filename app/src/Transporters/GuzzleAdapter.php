<?php

namespace app\src\Transporters;

use GuzzleHttp\Client;

class GuzzleAdapter implements TransportInterface
{
    /**
     * @param $url
     * @return mixed
     */
    public function get(string $url)
    {
        $client = new Client();

        return $client->get($url)->getBody()->getContents();
    }
}