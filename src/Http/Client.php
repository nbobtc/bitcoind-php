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
        $this->request->withHeader('Content-Type', 'application/json');
    }

    /**
     * {@inheritDoc}
     */
    public function sendCommand(CommandInterface $command)
    {
        $this->command = $command;
    }

    /**
     * @return \Psr\Http\Message\RequestInterface
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @return \Nbobtc\Command\CommandInterface
     */
    public function getCommand()
    {
        return $this->command;
    }
}
