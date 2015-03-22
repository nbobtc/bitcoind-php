nbobtc/bitcoind-php [![Travis branch](https://img.shields.io/travis/nbobtc/bitcoind-php/2.x.svg)](https://travis-ci.org/nbobtc/bitcoind-php) [![Packagist](https://img.shields.io/packagist/v/nbobtc/bitcoind-php.svg)](https://packagist.org/packages/nbobtc/bitcoind-php) [![Packagist Pre Release](https://img.shields.io/packagist/vpre/nbobtc/bitcoind-php.svg)](https://packagist.org/packages/nbobtc/bitcoind-php)
===================

[![Code Climate](https://img.shields.io/codeclimate/github/nbobtc/bitcoind-php.svg)](https://codeclimate.com/github/nbobtc/bitcoind-php) [![Code Climate](https://img.shields.io/codeclimate/coverage/github/nbobtc/bitcoind-php.svg)](https://codeclimate.com/github/nbobtc/bitcoind-php) [![SensioLabs Insight](https://img.shields.io/sensiolabs/i/c7af9182-f53b-4164-820d-46e7499252f3.svg)](https://insight.sensiolabs.com/projects/c7af9182-f53b-4164-820d-46e7499252f3)

This project is a wrapper for a bitcoind daemon. This project is still being
worked on and the interface may change a little until I get something more
stable.

> NOTE: This is version 2.x of this project. There is a more stable version of
> this on the 1.x branch.

## Installation

You can install this library by using [Composer]. You can also view more info
about this on [Packagist].

Add this to the `require` section in your `composer.json` file.

```json
{
    "require": {
        "nbobtc/bitcoind-php": "~2.0@dev"
    }
}
```

## Usage

To use the project you need to just create a new instance of the class.

```php
$command = new \Nbobtc\Command\Command('getinfo');
$client  = new \Nbobtc\Http\Client('https://username:password@localhost:18332');

/** @var \Nbobtc\Http\Message\Response */
$response = $client->sendCommand($command);

/** @var string */
$contents = $response->getBody()->getContents();
```

You are able to get the [Request] and [Response] objects back from
the client with the correct getters: `getRequest()` and `getResponse()`.

You can also parse the response however you wish to do so since the result is
returned to you as a string. See below for some ideas!

## Commands

Commands are created in such a way that this will support any future updates the
[Bitcoin API] by providing you with an easy class that sets all the required
information.

You are able to pass into the object the `method` and the `parameters` that are
required. Here are a few examples:

```php
$command = new Command('getblock', array('000000000019d6689c085ae165831e934ff763ae46a2a6c172b3f1b60a8ce26f'));
$command = new Command('getinfo');
```

The second argument MUST be in the same order as on the [Bitcoin API] wiki page.
There is no need to assign the values any keys.

## Curl Driver

Drivers are meant to be used with the client for connecting to a bitcoind
service. By default a `CurlDriver` is used. This provides you with some
flexibility on setting this up custom for your own configuration.

You can set various [cURL Options] by passing them into the function
`addCurlOption($option, $value)`.

Here's an example of how to configure and use the driver.

```php
$driver = new \Nbobtc\Http\Driver\CurlDriver();
$driver
    ->addCurlOption(CURLOPT_VERBOSE, true)
    ->addCurlOption(CURLOPT_STDERR, '/var/logs/curl.err');

$client = new \Nbobtc\Http\Client('https://username:password@localhost:18332');
$client->withDriver($driver);
```

Feel free to take a look at the `CurlDriver` source code.

## How to enable a Keep-Alive

This example shows how you are able to set the client up to [Persistent
Connection].

```php
$client = new \Nbobtc\Http\Client('https://username:password@localhost:18332');
$client->getRequest()->withHeader('Connection', 'Keep-Alive');
```

## How to set a CA Cert

This library provides some wonderful flexibility that will allow you to
configure the client to use your own CA Cert.

```php
$driver = new \Nbobtc\Http\Driver\CurlDriver();
$driver->addCurlOption(CURLOPT_CAINFO, '/path/to/cert');

$client = new \Nbobtc\Http\Client('https://username:password@localhost:18332');
$client->withDriver($driver);
```

## Convert Output to an Array

Some like the arrays

```php
$response = $client->sendCommand($command);
$output   = json_decode($response->getBody()->getContents(), true);
```

## Convert Output to a stdClass object

Some like the objects

```php
$response = $client->sendCommand($command);
$output   = json_decode($response->getBody()->getContents());
```

## Tests

To run the tests you need to install the development packages using composer

```bash
php composer.phar install --dev
```

Once this is complete you can run phpunit

```bash
./bin/phpunit
```

## API Documentation

## Change log

See [CHANGELOG.md]

## Contributing

See [CONTRIBUTING.md]

## License (MIT) [![Packagist](https://img.shields.io/packagist/l/nbobtc/bitcoind-php.svg)](https://github.com/nbobtc/bitcoind-php/blob/2.x/LICENSE)

Copyright (C) 2012-2014 Joshua Estes

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
the Software, and to permit persons to whom the Software is furnished to do so,
subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

[Composer]: https://getcomposer.org/
[Packagist]: https://packagist.org/packages/nbobtc/bitcoind-php
[CHANGELOG.md]: https://github.com/nbobtc/bitcoind-php/blob/2.x/CHANGELOG.md
[CONTRIBUTING.md]: https://github.com/nbobtc/bitcoind-php/blob/2.x/CONTRIBUTING.md
[Bitcoin API]: https://en.bitcoin.it/wiki/Original_Bitcoin_client/API_Calls_list
[Persistent Connection]: http://en.wikipedia.org/wiki/HTTP_persistent_connection
[cURL Options]: http://php.net/manual/en/function.curl-setopt.php
