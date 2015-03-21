<?php
/**
 */

namespace Nbobtc\Http\Message;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;
use Nbobtc\Http\Message\Uri;

/**
 */
class Request extends Message implements RequestInterface
{
    /**
     * @var string
     */
    const HTTP_POST = 'POST';

    /**
     */
    protected $requestTarget;

    /**
     * @var string
     */
    protected $method;

    /**
     * @var UriInterface
     */
    protected $uri;

    public function __construct($uri = null, $method = self::HTTP_POST)
    {
        if ($uri instanceof \Psr\Http\Message\UriInterface) {
            $this->uri = $uri;
        } elseif (null !== $uri) {
            $this->uri = new Uri($uri);
        }

        $this->method = $method;
    }

    /**
     * {@inheritDoc}
     */
    public function getRequestTarget()
    {
        return $this->requestTarget;
    }

    /**
     * {@inheritDoc}
     */
    public function withRequestTarget($requestTarget)
    {
        $this->requestTarget = $requestTarget;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * {@inheritDoc}
     */
    public function withMethod($method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * {@inheritDoc}
     */
    public function withUri(UriInterface $uri)
    {
        $this->uri = $uri;

        return $this;
    }
}
