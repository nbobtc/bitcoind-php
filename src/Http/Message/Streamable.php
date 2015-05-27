<?php
/**
 * @author Joshua Estes
 * @copyright 2012-2015 Joshua Estes
 * @license https://github.com/nbobtc/bitcoind-php/blob/2.x/LICENSE MIT
 */

namespace Nbobtc\Http\Message;

use Psr\Http\Message\StreamInterface;

/**
 * Represents the body of the request/response
 *
 * This object does not use every function in the interface. Please be aware of
 * this.
 *
 * @since 2.0.0
 */
class Streamable implements StreamInterface
{
    /**
     * @var string
     */
    protected $contents;

    /**
     * Size of contents in bytes
     *
     * @var integer
     */
    protected $size;

    /**
     * @since 2.0.0
     * {@inheritdoc}
     */
    public function __toString()
    {
        return (string) $this->contents;
    }

    /**
     * @since 2.0.0
     * {@inheritdoc}
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @since 2.0.0
     * {@inheritdoc}
     */
    public function write($string)
    {
        $this->size     = strlen($string);
        $this->contents = (string) $string;

        return $this->size;
    }

    /**
     * @since 2.0.0
     * {@inheritdoc}
     */
    public function getContents()
    {
        return $this->contents;
    }

    /**
     * @since 2.0.0
     * @ignore
     * @codeCoverageIgnore
     * {@inheritdoc}
     */
    public function close()
    {
    }

    /**
     * @since 2.0.0
     * @ignore
     * @codeCoverageIgnore
     * {@inheritdoc}
     */
    public function detach()
    {
        return null;
    }

    /**
     * @since 2.0.0
     * @ignore
     * @codeCoverageIgnore
     * {@inheritdoc}
     */
    public function tell()
    {
        return false;
    }

    /**
     * @since 2.0.0
     * @ignore
     * @codeCoverageIgnore
     * {@inheritdoc}
     */
    public function eof()
    {
        return true;
    }

    /**
     * @since 2.0.0
     * @ignore
     * @codeCoverageIgnore
     * {@inheritdoc}
     */
    public function isSeekable()
    {
        return false;
    }

    /**
     * @since 2.0.0
     * @ignore
     * @codeCoverageIgnore
     * {@inheritdoc}
     */
    public function seek($offset, $whence = SEEK_SET)
    {
        return false;
    }

    /**
     * @since 2.0.0
     * @ignore
     * @codeCoverageIgnore
     * {@inheritdoc}
     */
    public function rewind()
    {
        return false;
    }

    /**
     * @since 2.0.0
     * @ignore
     * @codeCoverageIgnore
     * {@inheritdoc}
     */
    public function isWritable()
    {
        return true;
    }

    /**
     * @since 2.0.0
     * @ignore
     * @codeCoverageIgnore
     * {@inheritdoc}
     */
    public function isReadable()
    {
        return true;
    }

    /**
     * @since 2.0.0
     * @ignore
     * @codeCoverageIgnore
     * {@inheritdoc}
     */
    public function read($length)
    {
        return false;
    }

    /**
     * @since 2.0.0
     * @ignore
     * @codeCoverageIgnore
     * {@inheritdoc}
     */
    public function getMetadata($key = null)
    {
        return null;
    }
}
