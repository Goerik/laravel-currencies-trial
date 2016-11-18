<?php
namespace Tests\Parsers;

use App\Parsers\CbrRateParser;
use App\Parsers\CurlDownloader;
use App\Parsers\IRateParser;
use App\Parsers\RateParserFactory;
use App\Parsers\YahooRateParser;
use App\Services\RateService;
use Tests\Common\TestCase;

use Illuminate\Foundation\Testing\DatabaseTransactions;

class ParsersTest extends TestCase
{
    public function testCbrRateParsers()
    {
        $parser = new CbrRateParser("http://www.cbr.ru/scripts/XML_daily.asp", new CurlDownloader());

        $rate = $parser->getRate("USD");

        $this->assertTrue(is_double($rate));
    }

    public function testYahooRateParser()
    {
        $parser = new YahooRateParser("https://query.yahooapis.com/v1/public/yql?q=select+*+from+yahoo.finance.xchange+where+pair+=+\"USDRUB,EURRUB\"&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback", new CurlDownloader());

        $rate = $parser->getRate("USD");

        $this->assertTrue(is_double($rate));
    }

    public function testRateParserFactory()
    {
        $factory = new RateParserFactory();

        $parsersCount = $factory->getParsersCount();

        foreach ($factory->getRateParsers() as $parser)
        {
            $parsersCount--;

            $this->assertClassImplementsInterface($parser, IRateParser::class);
        }

        $this->assertEquals(0, $parsersCount);
    }


    public function testRateService()
    {
        $service = new RateService(new RateParserFactory());

        $rate = $service->getRate("USD");

        $this->assertTrue(is_double($rate));
    }


    protected function assertClassImplementsInterface($object, $interface)
    {
        $interfaces = class_implements($object);

        foreach ($interfaces as $class_interface)
        {
            if ($interface === $class_interface)
            {
                $this->assertTrue(true);

                return;
            }
        }

        $this->assertTrue(false);
    }


}

