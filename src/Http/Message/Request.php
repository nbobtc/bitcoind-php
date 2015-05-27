<?php
/**
 * @author Joshua Estes
 * @copyright 2012-2015 Joshua Estes
 * @license https://github.com/nbobtc/bitcoind-php/blob/2.x/LICENSE MIT
 */

namespace Nbobtc\Http\Message;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;
use Nbobtc\Http\Message\Uri;

/**
 * @since 2.0.0
 */
class Request extends Message implements RequestInterface
{
    /**
     * HTTP Methods
     *
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

    /**
     * @since 2.0.0
     * @param UriInterface|null $uri
     * @param string            $method
     * @throws \InvalidArgumentException
     */
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
     * @since 2.0.0
     * {@inheritDoc}
     */
    public function getRequestTarget()
    {
        return $this->requestTarget;
    }

    /**
     * @since 2.0.0
     * {@inheritDoc}
     */
    public function withRequestTarget($requestTarget)
    {
        $this->requestTarget = $requestTarget;

        return $this;
    }

    /**
     * @since 2.0.0
     * {@inheritDoc}
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @since 2.0.0
     * {@inheritDoc}
     */
    public function withMethod($method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * @since 2.0.0
     * {@inheritDoc}
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @since 2.0.0
     * {@inheritDoc}
     */
    public function withUri(UriInterface $uri, $preserveHost = false)
    {
        $this->uri = $uri;

        return $this;
    }
}
