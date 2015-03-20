<?php
/**
 */

namespace Nbobtc\Http\Message;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

/**
 */
class Request extends Message implements RequestInterface
{
    /**
     */
    protected $requestTarget;

    /**
     */
    protected $method;

    /**
     * @var UriInterface
     */
    protected $uri;

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
