<?php
/**
 * @author Joshua Estes
 * @copyright 2012-2015 Joshua Estes
 * @license https://github.com/nbobtc/bitcoind-php/blob/2.x/LICENSE MIT
 */

namespace Tests\Nbobtc\Http\Message;

use Nbobtc\Http\Message\Request;
use Zend\Diactoros\Uri;

/**
 */
class RequestTest extends \PHPUnit_Framework_TestCase
{
    public function testRequest()
    {
        $uri = new Uri('http://example.com/');
        $request = new Request();
        $this->assertInstanceOf('\Psr\Http\Message\UriInterface', $request->getUri());
        $this->assertEquals('', $request->getMethod());
        $this->assertInstanceOf('\Psr\Http\Message\RequestInterface', $request->withUri($uri));

        $request = new Request($uri);
        $this->assertInstanceOf('\Psr\Http\Message\UriInterface', $request->getUri());

        $request = $request->withMethod('GET');
        $this->assertInstanceOf('\Psr\Http\Message\RequestInterface', $request);
        $this->assertEquals('GET', $request->getMethod());
    }
}
