<?php
/**
 * @author Joshua Estes
 * @copyright 2012-2015 Joshua Estes
 * @license https://github.com/nbobtc/bitcoind-php/blob/2.x/LICENSE MIT
 */

namespace Nbobtc\Http\Message;

use Zend\Diactoros\Response as DiactorosResponse;

/**
 * @since 2.0.0
 *
 * @deprecated - please use a separate PSR-7 response implementation
 */
class Response extends DiactorosResponse
{
    /**
     * Status Code Constants
     *
     * @var integer
     *
     * @deprecated - constant was kept just for BC compliance
     */
    const HTTP_OK = 200;
}
