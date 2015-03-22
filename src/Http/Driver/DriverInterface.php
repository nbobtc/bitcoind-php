<?php
/**
 * @author Joshua Estes
 * @copyright 2012-2015 Joshua Estes
 * @license https://github.com/nbobtc/bitcoind-php/blob/2.x/LICENSE MIT
 */

namespace Nbobtc\Http\Driver;

use Psr\Http\Message\RequestInterface;

/**
 * @since 2.0.0
 */
interface DriverInterface
{
    /**
     * Sends Request to server and returns a response.
     *
     * This will throw an Exception if there was an error
     *
     * @since 2.0.0
     * @param \Psr\Http\Message\RequestInterface $request
     * @return \Psr\Http\Message\ResponseInterface;
     * @throws \Exception
     */
    public function execute(RequestInterface $request);
}
