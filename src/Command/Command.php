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
     * @param string $method
     * @param array  $parameters
     * @param string $id
     */
    public function __construct($method = null, array $parameters = array(), $id = null)
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

    /**
     * {@inheritDoc}
     */
    public function withMethod($method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function withParameters(array $parameters)
    {
        $this->parameters = $parameters;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function withId($id)
    {
        $this->id = $id;

        return $this;
    }
}
