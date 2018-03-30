<?php

namespace tests\Unit;

use app\src\Transporters\CurlStrategy;
use app\src\Transporters\GuzzleAdapter;

class AdaptersTest extends Base
{

    /**
     * @throws \Exception
     * @covers \app\src\Transporters\CurlStrategy::get
     */
    public function testCurlGoodData()
    {
        $transporter = new CurlStrategy();

        $result = $transporter->get('https://filmix.me/real_tv/104350-discovery-ulichnye-gonki.html');
        $this->assertTrue(is_string($result));
    }

    /**
     * @throws \Exception
     * @covers \app\src\Transporters\CurlStrategy::get
     */
    public function testCurlBadData()
    {
        $transporter = new CurlStrategy();

        $result = $transporter->get('https://...');
        $this->assertFalse(is_string($result));
    }

    /**
     * @throws \Exception
     * @covers \app\src\Transporters\GuzzleAdapter::get
     */
    public function testGuzzleGoodData()
    {
        $transporter = new GuzzleAdapter();

        $result = $transporter->get('http://kinokrad.co/315898-moy-malenkiy-poni.html');
        $this->assertTrue(is_string($result));
    }

    /**
     * @covers \app\src\Transporters\GuzzleAdapter::get
     * @expectedException \GuzzleHttp\Exception\ConnectException
     */
    public function testGuzzleBadData()
    {
        $transporter = new GuzzleAdapter();
        $transporter->get('http://...');

//        $client = new Client();

    }

}