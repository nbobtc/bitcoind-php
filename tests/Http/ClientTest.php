<?php
/**
 * @author Joshua Estes
 * @copyright 2012-2015 Joshua Estes
 * @license https://github.com/nbobtc/bitcoind-php/blob/2.x/LICENSE MIT
 */

namespace Tests\Nbobtc\Http;

use Nbobtc\Http\Client;
use Nbobtc\Command\Command;

/**
 */
class ClientTest extends \PHPUnit_Framework_TestCase
{
    public function testClient()
    {
        $client = new Client('https://username:password@localhost:18332');
        $this->assertNull($client->getResponse());

        $request = $client->getRequest();
        $this->assertInstanceOf('Psr\Http\Message\RequestInterface', $request);

        $uri = $request->getUri();
        $this->assertInstanceOf('Psr\Http\Message\UriInterface', $uri);
        $this->assertEquals('https', $uri->getScheme());
        $this->assertEquals('username:password', $uri->getUserInfo());
        $this->assertEquals('localhost', $uri->getHost());
        $this->assertEquals(18332, $uri->getPort());
    }

    public function testWithKeepAlive()
    {
        $client = new Client('https://username:password@localhost:18332');
        $client->getRequest()->withHeader('Connection', 'Keep-Alive');
    }

    public function testSendCommand()
    {
        $response = \Mockery::mock('\Psr\Http\Message\ResponseInterface');
        $driver   = \Mockery::mock('\Nbobtc\Http\Driver\DriverInterface');
        $driver
            ->shouldReceive('execute')
            ->andReturn($response);

        $client = new Client('https://username:password@localhost:18332');
        $client->withDriver($driver);
        $command  = new Command('gettransaction', array('transactionId'));
        $response = $client->sendCommand($command);
    }
}
