# PHP Booli v2.0 API

A lightweight object oriented wrapper for [Booli API v2](https://www.booli.se/api/).

[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Code Style][ico-cs]][link-cs]
[![Scrutinizer Code Quality][ico-scrutinizer]][link-scrutinizer]

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

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/freestream/Api_Booli_PHP/master.svg?style=flat-square
[ico-cs]: https://styleci.io/repos/92758166/shield?branch=master
[ico-scrutinizer]: http://img.shields.io/scrutinizer/g/freestream/Api_Booli_PHP.svg?style=flat-square

[link-travis]: https://travis-ci.org/freestream/Api_Booli_PHP
[link-cs]: https://styleci.io/repos/92758166
[link-scrutinizer]: https://scrutinizer-ci.com/g/freestream/Api_Booli_PHP/?branch=master
