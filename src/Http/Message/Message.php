<?php
/**
 */

namespace Nbobtc\Http\Message;

use Psr\Http\Message\MessageInterface;

/**
 */
class Message implements MessageInterface
{
    protected $version;
    protected $headers;
    protected $body;
}
