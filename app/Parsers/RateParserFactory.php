<?php

namespace App\Parsers;
/**
 * Created by Albert Umerov.
 * Date: 18.11.16
 * Time: 14:42
 */
class RateParserFactory
{

    private $parsers;

    public function __construct()
    {
        $this->parsers = [];

        $this->parsers[] = new CbrRateParser("http://www.cbr.ru/scripts/XML_daily.asp", new CurlDownloader());

        $this->parsers[] = new YahooRateParser("https://query.yahooapis.com/v1/public/yql?q=select+*+from+yahoo.finance.xchange+where+pair+=+\"USDRUB,EURRUB\"&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback", new CurlDownloader());

    }

    public function getParsersCount()
    {
        return count($this->parsers);
    }

    public function getRateParsers()
    {
        foreach ($this->parsers as $parser)
        {
            yield($parser);
        }
    }

}