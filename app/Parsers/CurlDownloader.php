<?php
/**
 * Created by Albert Umerov.
 * Date: 18.11.16
 * Time: 17:59
 */

namespace App\Parsers;


class CurlDownloader implements IHttpDownloader
{
    private $timeout;

    public function __construct($timeout = 5)
    {
        if (!function_exists('curl_init'))
        {
            die("Please install CURL");
        }
        $this->timeout = $timeout;

    }

    public function get($url)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);

        $output = curl_exec($ch);

        curl_close($ch);

        return $output === false ? null : $output;
    }
}