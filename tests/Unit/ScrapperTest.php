<?php

namespace tests\Unit;

use app\src\Models\Movie;
use app\src\Scrapper;

class ScrapperTest extends Base
{
    /**
     * @throws \Exception
     * @covers \app\src\Scrapper::get
     */
    public function testScrapper()
    {

        $curlStrategy = $this->getMockBuilder('app\src\Transporters\CurlStrategy')
            ->setMethods(['get'])
            ->getMock();

        $curlStrategy->expects($this->any())
            ->method('get')
            ->will($this->returnValue('data'));

        $filmixParser = $this->getMockBuilder('app\src\Parsers\FilmixParserStrategy')
            ->setMethods(['parse'])
            ->getMock();

        $filmixParser->expects($this->any())
            ->method('parse')
            ->will($this->returnValue(new Movie()));

        $parser = new Scrapper($curlStrategy, $filmixParser);

        $this->assertInstanceOf(Movie::class, $parser->get('http'));

        $this->assertTrue(method_exists($parser->parser,'parse'));
        $this->assertTrue(method_exists($parser->transporter,'get'));

    }


}