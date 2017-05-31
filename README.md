# PHP Booli v2.0 API

A lightweight object oriented wrapper for [Booli API v2](https://www.booli.se/api/).

[![Build Status](https://travis-ci.org/freestream/Api_Booli_PHP.svg?branch=master)](https://travis-ci.org/freestream/Api_Booli_PHP)

## Features

* Follows PSR-4 conventions and coding standard: autoload friendly
* Light and fast thanks to lazy loading of API classes
* Extensively tested and documented

## Requirements

* PHP >= 5.6
* (optional) PHPUnit to run tests.

## Basic usage of client

```php
<?php
use Booli\Client;
use Booli\Http\Authenticate;
use Booli\Composer\Sold as Composer;

$callerId = 'abc';
$key = '123';

$client = new Client(new Authenticate($callerId, $key));

$page = 0;
$composer = new Composer();
$composer->query('stockholm');

while ($result = $client->sold()->all($composer, 500, $page++)) {
    ...
}
```

## Run test cases
If you have installed ```PHPUnit``` you can run the test cases from the terminal

```shell
$ ./vendor/bin/phpunit
```
## License

`Api_Booli_PHP` is licensed under the MIT License - see the LICENSE file for details

