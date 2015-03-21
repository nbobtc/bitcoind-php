<?php
/**
 */

namespace Nbobtc\Http\Message;

use Psr\Http\Message\ResponseInterface;

/**
 */
class Response extends Message implements ResponseInterface
{
    protected $statusCode;
    protected $reasonPhrase;

    /**
     * {@inheritDoc}
     */
    public function getStatusCode()
    {
        return $this->code;
    }

    /**
     * {@inheritDoc}
     */
    public function withStatus($code, $reasonPhrase = null)
    {
        $this->code = $code;
        $this->reasonPhrase = $reasonPhrase;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getReasonPhrase()
    {
        return $this->reasonPhrase;
    }
}
