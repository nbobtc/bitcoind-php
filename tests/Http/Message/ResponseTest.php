<?php
/**
 * @author Joshua Estes
 * @copyright 2012-2015 Joshua Estes
 * @license https://github.com/nbobtc/bitcoind-php/blob/2.x/LICENSE MIT
 */

namespace Tests\Nbobtc\Http\Message;

use Nbobtc\Http\Message\Response;

class ResponseTest extends \PHPUnit_Framework_TestCase
{
    public function testResponse()
    {
        $response = new Response();
        $this->assertNull($response->getStatusCode());
        $this->assertNull($response->getReasonPhrase());

        $response->withStatus('200', 'OK');
        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
        $this->assertEquals('OK', $response->getReasonPhrase());
    }
}
