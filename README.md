nbobtc/bitcoind-php [![Travis branch](https://img.shields.io/travis/nbobtc/bitcoind-php/2.x.svg)](https://travis-ci.org/nbobtc/bitcoind-php) [![Packagist](https://img.shields.io/packagist/v/nbobtc/bitcoind-php.svg)](https://packagist.org/packages/nbobtc/bitcoind-php) [![Packagist Pre Release](https://img.shields.io/packagist/vpre/nbobtc/bitcoind-php.svg)](https://packagist.org/packages/nbobtc/bitcoind-php)
===================

[![Code Climate](https://img.shields.io/codeclimate/github/nbobtc/bitcoind-php.svg)](https://codeclimate.com/github/nbobtc/bitcoind-php) [![Code Climate](https://img.shields.io/codeclimate/coverage/github/nbobtc/bitcoind-php.svg)](https://codeclimate.com/github/nbobtc/bitcoind-php) [![SensioLabs Insight](https://img.shields.io/sensiolabs/i/c7af9182-f53b-4164-820d-46e7499252f3.svg)](https://insight.sensiolabs.com/projects/c7af9182-f53b-4164-820d-46e7499252f3)

> NOTE: This is version 2.x of this project. There is a more stable version of
> this on the 1.x branch.

This project is used to interact with a headless bitcoin program called
bitcoind. It also contains various utility classes for working with Bitcoin as a
PHP Developer.

## Installation

You can install this library by using [Composer]. You can also view more info
about this on [Packagist].

Add this to the `require` section in your `composer.json` file.

```json
{
    "require": {
        "nbobtc/bitcoind-php": "~2.0"
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
// No Parameters
$command = new Command('getinfo');

// One Parameter
$command = new Command('getblock', '000000000019d6689c085ae165831e934ff763ae46a2a6c172b3f1b60a8ce26f');

// Multiple Parameters
$command = new Command('sendfrom', array('fromaccount', 'tobitcoinaddress', 'amount'));
```

The second argument MUST be in the same order as on the [Bitcoin API] wiki page.
There is no need to assign the values any keys.

### Parameters

Parameters are the second argument when creating a new Command. This argument
can either be a string OR an array. For example, both of these are valid.

```php
$command = new Command('getblock', array('000000000019d6689c085ae165831e934ff763ae46a2a6c172b3f1b60a8ce26f'));
$command = new Command('getblock', '000000000019d6689c085ae165831e934ff763ae46a2a6c172b3f1b60a8ce26f');
```

Most commands in the [Bitcoin API] take one parameter. If it takes MORE than
one, you must pass the parameters in as an array in the ORDER you find them on
that page.

### Extending Commands

If, for any reason, you need to extend a command, it MUST implement
[CommandInterface]. You can find documentation within the interface on how to
implement this.

## Drivers

Drivers are used by the ClientInterface for connecting to a bitcoind service and
sending Requests. The return a Response. If you need to implement a new driver
take a look at the [DriverInterface].

### cURL Driver

This is used by default and allows you a lot of options for customizing it to
your needs.

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

## Cookbook

### How to enable a Keep-Alive ie Persistent Connection

This example shows how you are able to set the client up to [Persistent
Connection].

```php
$client = new \Nbobtc\Http\Client('https://username:password@localhost:18332');
$client->getRequest()->withHeader('Connection', 'Keep-Alive');
```

### How to set a CA Cert

This library provides some wonderful flexibility that will allow you to
configure the client to use your own CA Cert.

```php
$driver = new \Nbobtc\Http\Driver\CurlDriver();
$driver->addCurlOption(CURLOPT_CAINFO, '/path/to/cert');

$client = new \Nbobtc\Http\Client('https://username:password@localhost:18332');
$client->withDriver($driver);
```

### How to Convert Output to an Array

Some like the arrays

```php
$response = $client->sendCommand($command);
$output   = json_decode($response->getBody()->getContents(), true);
```

### How to Convert Output to a stdClass object

Some like the objects

```php
$response = $client->sendCommand($command);
$output   = json_decode($response->getBody()->getContents());
```

## Testing

All testing is done using PHPUnit. You should be able to run `phpunit` in the
root directory of this project (the directory where phpunit.xml.dist is located)
and the tests will run.

If submitting a pull request or working on this library, please make sure that
the tests will pass.

## Change log

See [CHANGELOG.md].

Contains information on releases such as what was added, changed, etc. It's good
to look at to see what has changed from release to release.

## Contributing

See [CONTRIBUTING.md].

Various ways on contributing to this project.

## Branching

### master

This is the latest and greatest, it should not be used an is considered
development for testing new features and functionality. This should NOT be used
in a production environment.

### 2.x

Current production branch. All 2.x tags come off of this branch.

### 1.x

Deprecated, only used for bug fixes and for historical records.

## Releasing

You can find a complete list of [Releases] on GitHub.

### Checklist

- [ ] Update `composer.json` with new minor or patch increase.
- [ ] Update `README.md` with installation instructions for new release.
- [ ] Update [CHANGELOG.md] with release info and get rid of unreleased section.
- [ ] Make tag and push tag up.
- [ ] Copy section in [CHANGELOG.md] that pertains to the release and add info to
      release docs on GitHub.
- [ ] Update [CHANGELOG.md] with unreleased section


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
[Releases]: https://github.com/nbobtc/bitcoind-php/releases
[CommandInterface]: https://github.com/nbobtc/bitcoind-php/blob/2.x/src/Command/CommandInterface.php
[Request]: https://github.com/nbobtc/bitcoind-php/blob/2.x/src/Http/Message/Request.php
[Response]: https://github.com/nbobtc/bitcoind-php/blob/2.x/src/Http/Message/Response.php
[DriverInterface]: https://github.com/nbobtc/bitcoind-php/blob/2.x/src/Http/Driver/DriverInterface.php
