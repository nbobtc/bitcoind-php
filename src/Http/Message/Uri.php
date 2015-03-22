<?php
/**
 * @author Joshua Estes
 * @copyright 2012-2015 Joshua Estes
 * @license https://github.com/nbobtc/bitcoind-php/blob/2.x/LICENSE MIT
 */

namespace Nbobtc\Http\Message;

use Psr\Http\Message\UriInterface;

/**
 * @since 2.0.0
 */
class Uri implements UriInterface
{
    /**
     * @var string
     */
    protected $scheme;

    /**
     * @var string
     */
    protected $authority;

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var string
     */
    protected $host;

    /**
     * @var integer
     */
    protected $port;

    /**
     * @var string
     */
    protected $path;

    /**
     * @var string
     */
    protected $query;

    /**
     * @var string
     */
    protected $fragment;

    /**
     * @param string $dsn
     */
    public function __construct($dsn = null)
    {
        if (null !== $dsn) {
            $this->parseDsn($dsn);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {
        return sprintf(
            '%s://%s:%s@%s:%s',
            $this->scheme,
            $this->username,
            $this->password,
            $this->host,
            $this->port
        );
    }

    /**
     * {@inheritDoc}
     */
    public function getScheme()
    {
        return $this->scheme;
    }

    /**
     * {@inheritDoc}
     */
    public function getAuthority()
    {
        return $this->authority;
    }

    /**
     * {@inheritDoc}
     */
    public function getUserInfo()
    {
        return sprintf('%s:%s', $this->username, $this->password);
    }

    /**
     * {@inheritDoc}
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * {@inheritDoc}
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * {@inheritDoc}
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * {@inheritDoc}
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * {@inheritDoc}
     */
    public function getFragment()
    {
        return $this->fragment;
    }

    /**
     * {@inheritDoc}
     */
    public function withScheme($scheme)
    {
        $this->scheme = $scheme;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function withUserInfo($user, $password = null)
    {
        $this->username = $user;
        $this->password = $password;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function withHost($host)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function withPort($port)
    {
        $this->port = $port;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function withPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function withQuery($query)
    {
        $this->query = $query;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function withFragment($fragment)
    {
        $this->fragment = $fragment;

        return $this;
    }

    /**
     * @param string $dsn
     */
    public function parseDsn($dsn)
    {
        $components = parse_url($dsn);

        $this->withScheme($components['scheme']);
        $this->withHost($components['host']);
        $this->withPort($components['port']);
        $this->withUserInfo($components['user'], $components['pass']);
    }
}
