<?php
/**
 */

namespace Nbobtc\Http\Message;

use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\StreamableInterface;

/**
 */
class Message implements MessageInterface
{
    /**
     * @var float
     */
    protected $version;

    /**
     * @var array
     */
    protected $headers;

    /**
     * @var string
     */
    protected $body;

    /**
     * {@inheritDoc}
     */
    public function getProtocolVersion()
    {
        return $this->version;
    }

    /**
     * {@inheritDoc}
     */
    public function withProtocolVersion($version)
    {
        $this->version = (string) $version;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * {@inheritDoc}
     */
    public function hasHeader($name)
    {
        return isset($this->headers[$name]);
    }

    /**
     * {@inheritDoc}
     */
    public function getHeader($name)
    {
        if ($this->hasHeader($name)) {
            return $this->headers[$name];
        }

        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getHeaderLines($name)
    {
        return $this->headers[$name];
    }

    /**
     * {@inheritDoc}
     */
    public function withHeader($name, $value)
    {
        $this->headers[$name] = $value;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function withAddedHeader($name, $value)
    {
        $this->headers[$name] = $value;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function withoutHeader($name)
    {
        if ($this->hasHeader($name)) {
            unset($this->headers[$name]);
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * {@inheritDoc}
     */
    public function withBody(StreamableInterface $body)
    {
        $this->body = $body;

        return $this;
    }
}
