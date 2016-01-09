<?php
/**
 * @author Joshua Estes
 * @copyright 2012-2015 Joshua Estes
 * @license https://github.com/nbobtc/bitcoind-php/blob/2.x/LICENSE MIT
 */

namespace Nbobtc\Http\Message;

use Zend\Diactoros\Request as DiactorosRequest;

/**
 * @since 2.0.0
 */
class Request extends DiactorosRequest
{
    /**
     * HTTP Methods
     *
     * @var string
     *
     * @deprecated - constant was kept just for BC compliance
     */
    const HTTP_POST = 'POST';
}
