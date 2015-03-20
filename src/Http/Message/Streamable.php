<?php
/**
 */

namespace Nbobtc\Http\Message;

use Psr\Http\Message\StreamableInterface;

/**
 */
class Streamable implements StreamableInterface
{
    /**
     * @var string
     */
    protected $contents;

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {
        return (string) $this->contents;
    }

    /**
     * {@inheritDoc}
     */
    public function close()
    {
    }

    /**
     * {@inheritDoc}
     */
    public function detach()
    {
    }

    /**
     * {@inheritDoc}
     */
    public function getSize()
    {
    }

    /**
     * {@inheritDoc}
     */
    public function tell()
    {
    }

    /**
     * {@inheritDoc}
     */
    public function eof()
    {
    }

    /**
     * {@inheritDoc}
     */
    public function isSeekable()
    {
    }

    /**
     * {@inheritDoc}
     */
    public function seek($offset, $whence = SEEK_SET)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function rewind()
    {
    }

    /**
     * {@inheritDoc}
     */
    public function isWritable()
    {
    }

    /**
     * {@inheritDoc}
     */
    public function write($string)
    {
        $this->contents = (string) $string;
    }

    /**
     * {@inheritDoc}
     */
    public function isReadable()
    {
    }

    /**
     * {@inheritDoc}
     */
    public function read($length)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function getContents()
    {
        return $this->contents;
    }

    /**
     * {@inheritDoc}
     */
    public function getMetadata($key = null)
    {
    }
}
