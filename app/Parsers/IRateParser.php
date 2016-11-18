<?php
/**
 * Created by Albert Umerov.
 * Date: 18.11.16
 * Time: 16:20
 */

namespace App\Parsers;


interface IRateParser
{
    public function getRate($currencyCode);
}