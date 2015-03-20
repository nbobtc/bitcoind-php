nbobtc/bitcoind-php [![Travis branch](https://img.shields.io/travis/nbobtc/bitcoind-php/2.x.svg)](https://travis-ci.org/nbobtc/bitcoind-php) [![Packagist](https://img.shields.io/packagist/v/nbobtc/bitcoind-php.svg)](https://packagist.org/packages/nbobtc/bitcoind-php) [![Packagist Pre Release](https://img.shields.io/packagist/vpre/nbobtc/bitcoind-php.svg)](https://packagist.org/packages/nbobtc/bitcoind-php)
===================

This project is a wrapper for a bitcoind daemon. This project is still being
worked on and the interface may change a little until I get something more
stable.

## Installation

You can install this library by using [Composer]. You can also view more info
about this on [Packagist].

Add this to the `requires` in your `composer.json` file.

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
<?php

$command = new \Nbobtc\Command\Command('getinfo');
$client  = new \Nbobtc\Http\Client('https://username:password@localhost:18332');

/** @var \Nbobtc\Http\Message\Response */
$response = $client->sendCommand($command);

var_dump($response->getBody());
```

You are able to get the [Request], [Response], and [Command] objects back from
the client with the correct getters: `getRequest()`, `getResponse()`, and
`getCommand()`.

## How to enable a Keep-Alive



## How to set a CA Cert



## How to Configure to use Blockchain.info



## How to Create Your Own Commands



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

## Donate

Consider a donation [16yRSB46xMeWKfWtqcuqSVV7B2eSjkd92D]

Thanks.

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
[16yRSB46xMeWKfWtqcuqSVV7B2eSjkd92D]: bitcoin://16yRSB46xMeWKfWtqcuqSVV7B2eSjkd92D
