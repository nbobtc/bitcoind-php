nbobtc/bitcoind-php
===================

This project is a wrapper for a bitcoind daemon. This project is still
being worked on and the interface may change a little until I get something
more stable.

## Installation

You can install this library by using [composer](http://getcomposer.org/). You
can also view more info about this on [packagist](https://packagist.org/packages/nbobtc/bitcoind-php).

Add this to the `requires` in your `composer.json` file.

    "nbobtc/bitcoind-php": "1.0.*@dev"

## Usage

To use the project you need to just create a new instance of the class.

    <?php

    use Nbobtc\Bitcoind\Bitciond;

    $bitcoind = new Bitcoind('https', 'username', 'password', '127.0.0.1', 8332);

You can view the [BitcoindInterface](https://github.com/nbobtc/bitcoind-php/blob/master/src/Nbobtc/Bitcoind/BitcoindInterface.php)
file for a list of methods and descriptions of what they are and how to use them.

## License (MIT)

Copyright (C) 2012-2013 Joshua Estes

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
