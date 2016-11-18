<?php

namespace App\Http\Controllers;

use App\Services\RateService;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RateService $rateService)
    {
        $time = date("Y-m-d | h:m:s");
        $rate = $rateService->getRate("USD");
        return view('home', compact('rate', 'time'));
    }
}
