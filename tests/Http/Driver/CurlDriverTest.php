<?php
/**
 * @author Thomas Kerin
 * @copyright 2017 Thomas Kerin
 * @license https://github.com/nbobtc/bitcoind-php/blob/2.x/LICENSE MIT
 */

namespace Tests\Nbobtc\Http\Driver;
use Nbobtc\Http\Driver\CurlDriver;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Request;

/**
 */
class CurlDriverTest extends \PHPUnit_Framework_TestCase
{
    public function testExplodesWithTwo() {
        $body = new \Zend\Diactoros\Stream('php://temp', 'w+');
        $body->write("test");

        $request = (new Request("https://google.com"));
        $request = $request->withBody($body);

        $driver = new CurlDriver();
        /** @var \Psr\Http\Message\ResponseInterface */
        $response = $driver->execute($request);
        $this->assertInstanceOf("Psr\Http\Message\ResponseInterface", $response);

        $driver = new CurlDriver();
        /** @var \Psr\Http\Message\ResponseInterface */
        $response = $driver->execute($request);
        $this->assertInstanceOf("Psr\Http\Message\ResponseInterface", $response);
    }
}
