<?php
/**
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
        $message
            ->withProtocolVersion(1.1);

        $this->assertEquals('1.1', $message->getProtocolVersion());
    }
}
