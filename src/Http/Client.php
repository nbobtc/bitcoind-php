<?php
/**
 * @author Joshua Estes
 * @copyright 2012-2015 Joshua Estes
 * @license https://github.com/nbobtc/bitcoind-php/blob/2.x/LICENSE MIT
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
 * @since 2.0.0
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
     * @since 2.0.0
     * @param string $dsn Data Source Name
     */
    public function __construct($dsn)
    {
        $this->driver  = new CurlDriver();
        $this->request = new Request($dsn);
        $this->request->withHeader('Content-Type', 'application/json');
    }

    /**
     * @since 2.0.0
     * {@inheritdoc}
     */
    public function sendCommand(CommandInterface $command)
    {
        $this->request->getBody()->write(json_encode(
            array(
                'method' => $command->getMethod(),
                'params' => $command->getParameters(),
                'id'     => $command->getId(),
            )
        ));

        $this->response = $this->driver->execute($this->request);

        return $this->response;
    }

    /**
     * @since 2.0.0
     * @param \Nbobtc\Http\Driver\DriverInterface $driver
     * @return self
     */
    public function withDriver(DriverInterface $driver)
    {
        $this->driver = $driver;

        return $this;
    }

    /**
     * @since 2.0.0
     * @return \Psr\Http\Message\RequestInterface
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @since 2.0.0
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function getResponse()
    {
        return $this->response;
    }
}
