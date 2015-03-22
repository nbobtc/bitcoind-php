<?php
/**
 * @author Joshua Estes
 * @copyright 2012-2015 Joshua Estes
 * @license https://github.com/nbobtc/bitcoind-php/blob/2.x/LICENSE MIT
 */

namespace Tests\Nbobtc\Http\Message;

use Nbobtc\Http\Message\Streamable;

class StreamableTest extends \PHPUnit_Framework_TestCase
{
    public function testStreamable()
    {
        $streamable = new Streamable();
        $this->assertEquals('', (string) $streamable);

        $size = strlen('satoshi');
        $this->assertEquals($size, $streamable->write('satoshi'));
        $this->assertEquals($size, $streamable->getSize());
        $this->assertEquals('satoshi', $streamable->getContents());
        $this->assertEquals('satoshi', (string) $streamable);
    }
}
