<?php

namespace app\src\Transporters;

use GuzzleHttp\Client;

class GuzzleAdapter implements TransportAdapterInterface
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