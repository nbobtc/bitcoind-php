<?php
/**
 */

namespace Nbobtc\Http;

use Nbobtc\Http\Message\Request;
use Nbobtc\Http\Message\Response;
use Nbobtc\Command\CommandInterface;
use Nbobtc\Http\Driver\CurlDriver;
use Nbobtc\Http\Driver\DriverInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 */
class Client implements ClientInterface
{
    /**
     * @var \Psr\Http\Message\RequestInterface
     */
    protected $request;

    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    protected $response;

    /**
     * @var \Nbobtc\Http\Driver\DriverInterface
     */
    protected $driver;

    /**
     * @param string $dsn Data Source Name
     */
    public function __construct($dsn)
    {
        $this->driver  = new CurlDriver();
        $this->request = new Request($dsn);
        $this->request->withHeader('Content-Type', 'application/json');
    }

    /**
     * {@inheritDoc}
     */
    public function sendCommand(CommandInterface $command)
    {
    }

    public function withDriver(DriverInterface $driver)
    {
        $this->driver = $driver;

        return $this;
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
}
