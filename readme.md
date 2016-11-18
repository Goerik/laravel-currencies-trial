# Simple Trial Task Solutions

Simple Currency Rate Parser for http://www.cbr.ru/ and https://query.yahooapis.com/

## Contains

* Docker container (PHP/ Apache / Mysql)
* Laravel 5.3
* Application Files

## Main Applications Files
	
~~~~
app
├── Http
│   ├── Controllers
│   │   ├── Controller.php
│   │   └── HomeController.php
├── Models
│   ├── Currency.php
│   └── CurrencyRate.php
├── Parsers
│   ├── CbrRateParser.php
│   ├── CurlDownloader.php
│   ├── IHttpDownloader.php
│   ├── IRateParser.php
│   ├── RateParserFactory.php
│   └── YahooRateParser.php
└── Services
    └── RateService.php
	
resources/
└── views
    ├── home.blade.php
    └── layouts
        └── main.blade.php

database/
├── migrations
│   ├── 2016_11_17_173205_create_currencies_table.php
│   └── 2016_11_17_173214_create_currency_rates_table.php
└── seeds
    ├── CurrencyRateSeeder.php
    ├── CurrencySeeder.php
    └── DatabaseSeeder.php

tests/
├── Common
│   └── TestCase.php
└── Parsers
    └── ParsersTest.php	
	
~~~~

## Deployment
Via docker-compose (docker-compose.yml)

cd to project folder and execute:
~~~~
docker-compose up
~~~~


