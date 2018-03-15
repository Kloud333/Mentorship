<?php

namespace app\src;

use app\src\Models\Movie;
use app\src\Parsers\ParserAdapterInterface;
use app\src\Transporters\TransportAdapterInterface;

class Scrapper
{
    /**
     * @var TransportAdapterInterface
     */
    public $transporter;

    /**
     * @var ParserAdapterInterface
     */
    public $parser;

    /**
     * Scrapper constructor.
     * @param TransportAdapterInterface $transporter
     * @param ParserAdapterInterface $parser
     */
    public function __construct(TransportAdapterInterface $transporter, ParserAdapterInterface $parser)
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