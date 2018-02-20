<?php

namespace app\src\Transporters;


class CurlTransport implements TransportInterface
{

    /**
     * @param $url
     * @return mixed
     */
    public function get($url)
    {
        $connect = curl_init($url);
        curl_setopt($connect, CURLOPT_HEADER, 0);
        curl_setopt($connect, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($connect, CURLOPT_URL, $url);
        curl_setopt($connect, CURLOPT_FOLLOWLOCATION, 1);

        $data = curl_exec($connect);

        curl_close($connect);

        return $data;
    }
}