nbobtc/bitcoind-php [![Build Status](https://travis-ci.org/nbobtc/bitcoind-php.png?branch=master)](https://travis-ci.org/nbobtc/bitcoind-php)
===================

[![Latest Stable Version](https://poser.pugx.org/nbobtc/bitcoind-php/v/stable.svg)](https://packagist.org/packages/nbobtc/bitcoind-php) [![Total Downloads](https://poser.pugx.org/nbobtc/bitcoind-php/downloads.svg)](https://packagist.org/packages/nbobtc/bitcoind-php) [![Latest Unstable Version](https://poser.pugx.org/nbobtc/bitcoind-php/v/unstable.svg)](https://packagist.org/packages/nbobtc/bitcoind-php) [![License](https://poser.pugx.org/nbobtc/bitcoind-php/license.svg)](https://packagist.org/packages/nbobtc/bitcoind-php)

This is a library that is designed to be a wrapper around a bitcoind daemon. You
will be able to use this library in your code to allow you to interact with
various nodes in your system.

# Installation

You can install this library by using [composer](http://getcomposer.org/). You
can also view more info about this on [packagist](https://packagist.org/packages/nbobtc/bitcoind-php).

```bash
$ composer.phar require "nbobtc/bitcoind-php:~2.0@dev"
```

# Simple Usage Example

```php
<?php

use Nbobtc\Component\Bitcoind\Command\Command;
use Nbobtc\Component\Bitcoind\Client;

$client  = new Client('https://username:password@localhost:18332');
$command = new Command($client);
$command->setMethod('getinfo');

$result = $command->getArrayResult();
```

# Commands


# Cookbook

## Using Blockchain.info

# Testing

To run the tests you need to install the development packages using composer

```bash
$ php composer.phar install --dev
```

Once this is complete you can run phpunit

```bash
./bin/phpunit
```

# Donate

Consider a donation [16yRSB46xMeWKfWtqcuqSVV7B2eSjkd92D](bitcoin:16yRSB46xMeWKfWtqcuqSVV7B2eSjkd92D)

Thanks.

# License (MIT)

Copyright (C) 2012-2015 Joshua Estes

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
