<?php

namespace Nbobtc\Http;

/**
 */
interface ClientInterface
{

    /**
     * @param string $method
     * @param string $params
     * @param string $id
     *
     * @return mixed
     */
    public function execute($method, $params = null, $id = null);
}
