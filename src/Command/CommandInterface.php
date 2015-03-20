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
}
