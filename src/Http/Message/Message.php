<?php
/**
 * @author Joshua Estes
 * @copyright 2012-2015 Joshua Estes
 * @license https://github.com/nbobtc/bitcoind-php/blob/2.x/LICENSE MIT
 */

namespace Nbobtc\Http\Message;

use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\StreamInterface;
use Nbobtc\Http\Message\Streamable;

/**
 * @since 2.0.0
 */
class Message implements MessageInterface
{
    /**
     * @var string
     */
    protected $version = '1.1';

    /**
     * @var array
     */
    protected $headers = array();

    /**
     * @var \Psr\Http\Message\StreamableInterface
     */
    protected $body;

    /**
     * @since 2.0.0
     * {@inheritDoc}
     */
    public function getProtocolVersion()
    {
        return $this->version;
    }

    /**
     * @since 2.0.0
     * {@inheritDoc}
     */
    public function withProtocolVersion($version)
    {
        $this->version = (string) $version;

        return $this;
    }

    /**
     * @since 2.0.0
     * {@inheritDoc}
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @since 2.0.0
     * {@inheritDoc}
     */
    public function hasHeader($name)
    {
        foreach ($this->headers as $header => $values) {
            if (0 === strcasecmp($header, $name)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @since 2.0.0
     * {@inheritDoc}
     */
    public function getHeader($name)
    {
        foreach ($this->headers as $header => $values) {
            if (0 === strcasecmp($header, $name)) {
                return $this->headers[$header];
            }
        }

        return null;
    }

    /**
     * @todo
     * @since 2.0.2
     * {@inheritDoc}
     */
    public function getHeaderLine($name)
    {
        return '';
    }

    /**
     * @since 2.0.0
     * {@inheritDoc}
     */
    public function getHeaderLines($name)
    {
        if ($lines = $this->getHeader($name)) {
            return $lines;
        }

        return array();
    }

    /**
     * @since 2.0.0
     * {@inheritDoc}
     */
    public function withHeader($name, $value)
    {
        if (is_array($value)) {
            $this->headers[$name] = $value;
        } else {
            $this->headers[$name] = array($value);
        }

        return $this;
    }

    /**
     * @since 2.0.0
     * {@inheritDoc}
     */
    public function withAddedHeader($name, $value)
    {
        $this->headers[$name] = $value;

        return $this;
    }

    /**
     * @since 2.0.0
     * {@inheritDoc}
     */
    public function withoutHeader($name)
    {
        foreach ($this->headers as $header => $values) {
            if (0 === strcasecmp($header, $name)) {
                unset($this->headers[$header]);
            }
        }

        return $this;
    }

    /**
     * @since 2.0.0
     * {@inheritDoc}
     */
    public function getBody()
    {
        if (null === $this->body) {
            $this->body = new Streamable();
        }

        return $this->body;
    }

    /**
     * @since 2.0.0
     * {@inheritDoc}
     */
    public function withBody(StreamInterface $body)
    {
        $this->body = $body;

        return $this;
    }
}
