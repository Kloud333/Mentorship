<?php

namespace app\src\Transporters;


class CurlAdapter implements TransportAdapterInterface
{
    /**
     * @param $url
     * @return mixed
     */
    public function get($url)
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