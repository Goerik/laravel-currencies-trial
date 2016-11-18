<?php

namespace App\Parsers;
/**
 * Created by Albert Umerov.
 * Date: 18.11.16
 * Time: 14:42
 */
class CbrRateParser implements IRateParser
{

    private
        $xml = null,
        $url,
        $downloader;

    public function __construct($url, IHttpDownloader $downloader)
    {
        $this->url = $url;
        $this->downloader = $downloader;
    }

    public function getRate($currencyCode)
    {
        if (is_null($this->xml))
        {
            $content = $this->downloader->get($this->url);
            $this->xml = simplexml_load_string($content);
            if (is_null($this->xml) || $this->xml === false) {
                return null;
            }
        }

        foreach ($this->xml->Valute as $valute)
        {
            if ($valute->CharCode == $currencyCode)
            {
                $value = str_replace(",", ".", $valute->Value);
                return (double)$value;
            };
        }
        return null;
    }

}