<?php
/**
 * @author Joshua Estes
 * @copyright 2012-2015 Joshua Estes
 * @license https://github.com/nbobtc/bitcoind-php/blob/2.x/LICENSE MIT
 */

namespace Nbobtc\Http;

use Nbobtc\Command\CommandInterface;

/**
 * @since 2.0.0
 */
interface ClientInterface
{
    /**
     * @params \Nbobtc\Command\CommandInterface $command
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Exception
     */
    public function sendCommand(CommandInterface $command);
}
