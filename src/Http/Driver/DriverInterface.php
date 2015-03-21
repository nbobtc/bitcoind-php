<?php
/**
 */

namespace Nbobtc\Http\Driver;

use Psr\Http\Message\RequestInterface;

/**
 */
interface DriverInterface
{
    /**
     * @param \Psr\Http\Message\RequestInterface $request
     * @return \Psr\Http\Message\ResponseInterface;
     * @throws \Exception
     */
    public function execute(RequestInterface $request);
}
