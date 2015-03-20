<?php
/**
 */

namespace Nbobtc\Http\Message;

use Psr\Http\Message\UriInterface;

/**
 */
class Uri implements UriInterface
{
    protected $schema;
    protected $authority;
    protected $userInfo;
    protected $host;
    protected $port;
    protected $path;
    protected $query;
    protected $fragment;

    public function __toString()
    {
    }

    public function getSchema()
    {
    }
}
