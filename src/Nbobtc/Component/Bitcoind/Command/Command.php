<?php

namespace Nbobtc\Component\Bitcoind\Command;

abstract class Command implements CommandInterface
{
    protected $client;

    public function setClient($client)
    {
        $this->client = $client;
    }

    abstract public function getArrayResult();
    abstract public function getObjectResult();
}
