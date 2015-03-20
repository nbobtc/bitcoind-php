<?php
/**
 */

namespace Nbobtc\Http;

use Nbobtc\Http\Message\Request;
use Nbobtc\Http\Message\Response;
use Nbobtc\Http\Message\RequestInterface;
use Nbobtc\Http\Message\ResponseInterface;
use Nbobtc\Command\CommandInterface;

/**
 */
class Client implements ClientInterface
{
    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @var ResponseInterface
     */
    protected $response;

    /**
     * @var CommandInterface
     */
    protected $command;

    /**
     * @param string $dsn Data Source Name
     */
    public function __construct($dsn)
    {
        $this->request = new Request($dsn);
    }

    /**
     * {@inheritDoc}
     */
    public function sendCommand(CommandInterface $command)
    {
        $this->command = $command;
    }
}
