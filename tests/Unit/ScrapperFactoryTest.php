<?php

namespace tests\Unit;


use app\src\ScrapperFactory;

class ScrapperFactoryTest extends Base
{


//    написати тест чи сріейт повертає обєкт скраппер
//    на вхід зробити дата провайдер

    /**
     * @throws \Exception
     * @covers \app\src\ScrapperFactory::create
     */
    public function testScrapperFactoryForExistingDomains()
    {
        $factory = new ScrapperFactory();

        $this->assertTrue(method_exists($factory->create('filmix'),'get'));
        $this->assertTrue(method_exists($factory->create('kinokrad'),'get'));
    }

    /**
     * @throws \Exception
     * @covers \app\src\ScrapperFactory::create
     * @expectedException \Exception
     */
    public function testScrapperFactoryForNotExistingDomains()
    {
        $factory = new ScrapperFactory();
        $this->assertFalse(method_exists($factory->create('kinogo'),'get'));
    }


}