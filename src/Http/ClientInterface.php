<?php
/**
 */

namespace Nbobtc\Http;

use Nbobtc\Command\CommandInterface;

/**
 */
interface ClientInterface
{
    /**
     * @params CommandInterface $command
     * @return Response
     * @throws \Exception
     */
    public function sendCommand(CommandInterface $command);
}
