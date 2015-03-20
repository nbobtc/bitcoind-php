<?php
/**
 */

namespace Nbobtc\Command;

/**
 */
interface CommandInterface
{
    /**
     * @return string
     */
    public function getId();

    /**
     * @return array
     */
    public function getParameters();

    /**
     * @return string
     */
    public function getMethod();

    /**
     * @param string $method
     * @return self
     */
    public function withMethod($method);

    /**
     * @param array $parameters
     * @return self
     */
    public function withParameters(array $parameters);

    /**
     * @param string $id
     * @return self
     */
    public function withId($id);
}
