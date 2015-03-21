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
     * @var string
     */
    protected $version;

    /**
     * @var array
     */
    protected $headers = array();

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
        foreach ($this->headers as $header => $values) {
            if (0 === strcasecmp($header, $name)) {
                return true;
            }
        }

        return false;
    }

    /**
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
        foreach ($this->headers as $header => $values) {
            if (0 === strcasecmp($header, $name)) {
                unset($this->headers[$header]);
            }
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
