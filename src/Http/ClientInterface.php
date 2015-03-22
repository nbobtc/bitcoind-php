<?php
/**
 * @author Joshua Estes
 * @copyright 2012-2015 Joshua Estes
 * @license https://github.com/nbobtc/bitcoind-php/blob/2.x/LICENSE MIT
 */

namespace Nbobtc\Http;

use Nbobtc\Command\CommandInterface;

/**
 * Client used to send commands to bitcoin servers/nodes
 *
 * Client is used to send commands to bitcoin servers and receives the
 * responses back from those servers. The client does little to no processing
 * or minipulation of the Command, Request, and Response objects.
 *
 * @since 2.0.0
 */
interface ClientInterface
{
    /**
     * Send Command to configured server
     *
     * Sends a command to a server and returns a Response object. If there was
     * an error it will throw an Exception.
     *
     * @since 2.0.0
     * @params \Nbobtc\Command\CommandInterface $command
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Exception
     */
    public function sendCommand(CommandInterface $command);
}
