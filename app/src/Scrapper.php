<?php

namespace app\src;


use app\src\Models\Movie;
use app\src\Parsers\ParserAdapter;
use app\src\Transporters\TransportAdapter;

class Scrapper
{
    /**
     * @var TransportAdapter
     */
    public $transporter;

    /**
     * @var ParserAdapter
     */
    public $parser;

    /**
     * Scrapper constructor.
     * @param TransportAdapter $transporter
     * @param ParserAdapter $parser
     */
    public function __construct(TransportAdapter $transporter, ParserAdapter $parser)
    {
        $this->transporter = $transporter;
        $this->parser = $parser;
    }

    /**
     * @param $url
     * @return Movie
     */
    public function get($url): Movie
    {
        $content = $this->transporter->get($url);
        return $this->parser->parse($content);
    }


}