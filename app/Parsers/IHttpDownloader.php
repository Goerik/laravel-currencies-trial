<?php
/**
 * Created by Albert Umerov.
 * Date: 18.11.16
 * Time: 17:58
 */

namespace App\Parsers;


interface IHttpDownloader
{
    public function get($url);
}