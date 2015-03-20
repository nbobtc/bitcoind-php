<?php
/**
 */

namespace Nbobtc\Command;

/**
 */
class Command implements CommandInterface
{
    /**
     * @var string
     */
    protected $method;

    /**
     * @var array
     */
    protected $parameters;

    /**
     * @var string
     */
    protected $id;

    /**
     */
    public function __construct($method, array $parameters = array(), $id = null)
    {
        $this->method     = $method;
        $this->parameters = $parameters;
        $this->id         = $id;
    }

    /**
     * {@inheritDoc}
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * {@inheritDoc}
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        return $this->id;
    }
}
