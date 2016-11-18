<?php

namespace App\Parsers;
/**
 * Created by Albert Umerov.
 * Date: 18.11.16
 * Time: 14:42
 */
class YahooRateParser implements IRateParser
{

    private
        $url,
        $json = null,
        $downloader;


    public function __construct($url, IHttpDownloader $downloader)
    {
        $this->url = $url;
        $this->downloader = $downloader;
    }

    public function getRate($currencyCode)
    {
        if (is_null($this->json))
        {
            $content = $this->downloader->get($this->url);

            $this->json = json_decode($content);

            if (is_null($this->json))
            {
                return null;
            }
        }

        foreach ($this->json->query->results->rate as $rate)
        {
            if (strpos($rate->Name, $currencyCode) === 0)
            {
                $value = str_replace(",", ".", $rate->Bid);
                return (double)$value;
            };
        }
        return null;
    }

}