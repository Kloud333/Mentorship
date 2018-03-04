<?php

namespace app\src\Transporters;

use GuzzleHttp\Client;

class GuzzleAdapter implements TransportAdapter
{
    /**
     * @param $url
     * @return mixed
     */
    public function get($url)
    {
        $client = new Client();
        $response = $client->get($url);

        return $response->getBody()->getContents();
    }
}