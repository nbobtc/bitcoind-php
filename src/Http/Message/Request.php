<?php
/**
 */

namespace Nbobtc\Http\Message;

use Psr\Http\Message\RequestInterface;

/**
 */
class Request extends Message implements RequestInterface
{
    protected $headers;
    protected $requestTarget;
    protected $method;
    protected $uri;
}
