<?php
/**
 */

namespace Tests\Nbobtc\Http\Message;

use Nbobtc\Http\Message\Uri;

/**
 */
class UriTest extends \PHPUnit_Framework_TestCase
{
    public function testUri()
    {
        $uri = new Uri('http://satoshi:bitcoin@host.com:18332');

        $this->assertEquals('http', $uri->getScheme());
        $this->assertEquals('satoshi:bitcoin', $uri->getUserInfo());
        $this->assertEquals('host.com', $uri->getHost());
        $this->assertEquals(18332, $uri->getPort());
    }
}
