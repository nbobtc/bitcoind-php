<?php
/**
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
        $client   = new Client('https://username:password@localhost:18332');
        $command  = new Command('gettransaction', array('transactionId'));
        // Commented out because by default this uses curl
        //$response = $client->sendCommand($command);
    }
}
