<?php

namespace Nbobtc\Component\Bitcoind\Command;

class Command implements CommandInterface
{
    protected $client;
    protected $parameters;
    protected $method;

    public function __construct($client)
    {
        $this->client = $client;
        $this->parameters = array();
    }

    public function getClient()
    {
        return $this->client;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getParameters()
    {
        return $this->parameters;
    }

    public function setClient($client)
    {
        $this->client = $client;

        return $this;
    }

    public function setMethod($method)
    {
        $this->method = $method;

        return $this;
    }

    public function addParameter($value)
    {
        $this->parameters[] = $value;
    }

    public function setParameters(array $parameters)
    {
        $this->parameters = $parameters;
    }

    public function getArrayResult()
    {
        return $this->getClient()->execute($this->getMethod(), $this->getParameters());
    }

    public function getObjectResult()
    {
        return $this->arrayToObject($this->getArrayResult());
    }

    protected function arrayToObject($array)
    {
        if (!is_array($array)) {
            return new \stdClass();
        }

        $returnValue = new \stdClass();

        foreach ($array as $key => $value) {
            $returnValue->$key = $value;
        }

        return $returnValue;
    }
}
