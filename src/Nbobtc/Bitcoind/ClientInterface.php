<?php

namespace Nbobtc\Bitcoind;

/**
 * @author Joshua Estes
 */
interface ClientInterface
{

    /**
     * @param
     * @param
     * @param
     *
     * @return
     */
    public function execute($method, $params = null, $id = null);
}
