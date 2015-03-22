<?php
/**
 * @author Joshua Estes
 * @copyright 2012-2015 Joshua Estes
 * @license https://github.com/nbobtc/bitcoind-php/blob/2.x/LICENSE MIT
 */

namespace Nbobtc\Http\Message;

use Psr\Http\Message\ResponseInterface;

/**
 * @since 2.0.0
 */
class Response extends Message implements ResponseInterface
{
    /**
     * Status Code Constants
     *
     * @var integer
     */
    const HTTP_OK = 200;

    /**
     * @var integer
     */
    protected $statusCode;

    /**
     * @var string
     */
    protected $reasonPhrase;

    /**
     * @since 2.0.0
     * {@inheritdoc}
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @since 2.0.0
     * {@inheritdoc}
     */
    public function withStatus($code, $reasonPhrase = null)
    {
        $this->statusCode   = (integer) $code;
        $this->reasonPhrase = $reasonPhrase;

        return $this;
    }

    /**
     * @since 2.0.0
     * {@inheritdoc}
     */
    public function getReasonPhrase()
    {
        return $this->reasonPhrase;
    }
}
