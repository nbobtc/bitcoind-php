<?php
/**
 * @author Joshua Estes
 * @copyright 2012-2015 Joshua Estes
 * @license https://github.com/nbobtc/bitcoind-php/blob/2.x/LICENSE MIT
 */

namespace Tests\Nbobtc\Http\Message;

use Nbobtc\Http\Message\Request;

/**
 */
class RequestTest extends \PHPUnit_Framework_TestCase
{
    public function testRequest()
    {
        $mock = \Mockery::mock('\Psr\Http\Message\UriInterface');
        $request = new Request();
        $this->assertNull($request->getUri());
        $this->assertEquals(Request::HTTP_POST, $request->getMethod());
        $this->assertInstanceOf('\Psr\Http\Message\RequestInterface', $request->withUri($mock));

        $request = new Request($mock);
        $this->assertInstanceOf('\Psr\Http\Message\UriInterface', $request->getUri());

        $this->assertInstanceOf('\Psr\Http\Message\RequestInterface', $request->withMethod('GET'));
        $this->assertEquals('GET', $request->getMethod());
    }
}
