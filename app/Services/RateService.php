<?php

namespace App\Services;

use App\Parsers\RateParserFactory;

/**
 * Created by Albert Umerov.
 * Date: 18.11.16
 * Time: 18:25
 */
class RateService
{
    private $parserFactory;

    public function __construct(RateParserFactory $parserFactory)
    {
        $this->parserFactory = $parserFactory;
    }

    public function getRate($currencyCode)
    {
        foreach ($this->parserFactory->getRateParsers() as $parser)
        {
            $rate = $parser->getRate($currencyCode);
            if (is_double($rate))
            {
                return $rate;
            }
        }

        return null;
    }
}
