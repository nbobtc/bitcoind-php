<?php
/**
 * @author Joshua Estes
 * @copyright 2012-2015 Joshua Estes
 * @license https://github.com/nbobtc/bitcoind-php/blob/2.x/LICENSE MIT
 */

namespace Nbobtc\Command;

/**
 * @since 2.0.0
 */
interface CommandInterface
{
    /**
     * @since 2.0.0
     * @return string
     */
    public function getId();

    /**
     * @since 2.0.0
     * @return array
     */
    public function getParameters();

    /**
     * @since 2.0.0
     * @return string
     */
    public function getMethod();

    /**
     * @since 2.0.0
     * @param string $method
     * @return self
     */
    public function withMethod($method);

    /**
     * @since 2.0.0
     * @param array|string $parameters
     * @return self
     */
    public function withParameters($parameters);

    /**
     * @since 2.0.0
     * @param string $id
     * @return self
     */
    public function withId($id);
}
