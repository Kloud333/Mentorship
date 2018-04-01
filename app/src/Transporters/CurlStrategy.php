<?php

namespace app\src\Transporters;

class CurlStrategy implements TransportInterface
{
    /**
     * @param $url
     * @return mixed
     */
    public function get(string $url)
    {
        $resource = curl_init($url);
        curl_setopt($resource, CURLOPT_HEADER, 0);
        curl_setopt($resource, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($resource, CURLOPT_URL, $url);
        curl_setopt($resource, CURLOPT_FOLLOWLOCATION, 1);

        $content = curl_exec($resource);

        curl_close($resource);

        return $content;
    }
}