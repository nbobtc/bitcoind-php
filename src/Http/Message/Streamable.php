<?php
/**
 * @author Joshua Estes
 * @copyright 2012-2015 Joshua Estes
 * @license https://github.com/nbobtc/bitcoind-php/blob/2.x/LICENSE MIT
 */

namespace Nbobtc\Http\Message;

use Zend\Diactoros\Stream;

/**
 * Represents the body of the request/response
 *
 * This object does not use every function in the interface. Please be aware of
 * this.
 *
 * @since 2.0.0
 *
 * @deprecated - please use a separate PSR-7 stream implementation
 */
class Streamable extends Stream
{
    public function __construct()
    {
        parent::__construct('php://memory', 'wb+');
    }
}
