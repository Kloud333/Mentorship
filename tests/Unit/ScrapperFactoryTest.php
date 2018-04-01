<?php

namespace tests\Unit;

use app\src\ScrapperFactory;

class ScrapperFactoryTest extends Base
{

    /**
     * @return array
     */
    public function goodScrapperFactoryDataProvider()
    {
        return [
            ['filmix'],
            ['kinokrad']
        ];
    }

    /**
     * @return array
     */
    public function badScrapperFactorProvider()
    {
        return [
            [5],
            [null],
            ['']
        ];
    }

    /**
     * @dataProvider goodScrapperFactoryDataProvider
     * @param $data
     * @covers \app\src\ScrapperFactory::create
     */
    public function testGoodResultScrapperFactory($data)
    {
        $factory = new ScrapperFactory();

        $this->assertTrue(is_a($factory->create($data), 'app\src\Scrapper'));

    }

    /**
     * @dataProvider badScrapperFactorProvider
     * @param $data
     * @covers \app\src\ScrapperFactory::create
     * @expectedException \Exception
     */
    public function testBadResultScrapperFactory($data)
    {
        $factory = new ScrapperFactory();
//        $factory->create($data);

        $this->markTestIncomplete();
    }

}