<?php
/**
 * @author Joshua Estes
 * @copyright 2012-2015 Joshua Estes
 * @license https://github.com/nbobtc/bitcoind-php/blob/2.x/LICENSE MIT
 */

namespace Tests\Nbobtc\Http\Message;

use Nbobtc\Http\Message\Message;

/**
 */
class MessageTest extends \PHPUnit_Framework_TestCase
{
    public function testMessage()
    {
        $message = new Message();
        $this->assertInstanceOf('\Psr\Http\Message\MessageInterface', $message->withProtocolVersion(1.1));
        $this->assertEquals('1.1', $message->getProtocolVersion());
    }

    public function testMessageHeaders()
    {
        $message = new Message();
        $this->assertEmpty($message->getHeaders());
        $this->assertNull($message->getHeader('aint-got-time-for-headers'));
        $this->assertEmpty($message->getHeaderLines('sad-panda'));

        $this->assertCount(0, $message->getHeaders());
        $this->assertInstanceOf('\Psr\Http\Message\MessageInterface', $message->withHeader('X-Header-Name', 'Test'));
        $this->assertCount(1, $message->getHeaders());
        $this->assertInstanceOf('\Psr\Http\Message\MessageInterface', $message->withHeader('X-Header', array('a', 'b')));
        $this->assertTrue($message->hasHeader('x-HEADER-name'));
        $this->assertFalse($message->hasHeader('head-name'));
        $this->assertCount(2, $message->getHeaders());
        $this->assertEquals(array('Test'), $message->getHeader('x-header-name'));
        $this->assertEquals(array('Test'), $message->getHeaderLines('x-header-name'));
    }
}
