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
     * @since 2.0.0
     * @param string $dsn
     */
    public function __construct($dsn = null)
    {
        if (null !== $dsn) {
            $this->parseDsn($dsn);
        }
    }

    /**
     * @since 2.0.0
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
     * @since 2.0.0
     * {@inheritDoc}
     */
    public function getScheme()
    {
        return $this->scheme;
    }

    /**
     * @since 2.0.0
     * {@inheritDoc}
     */
    public function getAuthority()
    {
        return $this->authority;
    }

    /**
     * @since 2.0.0
     * {@inheritDoc}
     */
    public function getUserInfo()
    {
        return sprintf('%s:%s', $this->username, $this->password);
    }

    /**
     * @since 2.0.0
     * {@inheritDoc}
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @since 2.0.0
     * {@inheritDoc}
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @since 2.0.0
     * {@inheritDoc}
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @since 2.0.0
     * {@inheritDoc}
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @since 2.0.0
     * {@inheritDoc}
     */
    public function getFragment()
    {
        return $this->fragment;
    }

    /**
     * @since 2.0.0
     * {@inheritDoc}
     */
    public function withScheme($scheme)
    {
        $this->scheme = $scheme;

        return $this;
    }

    /**
     * @since 2.0.0
     * {@inheritDoc}
     */
    public function withUserInfo($user, $password = null)
    {
        $this->username = $user;
        $this->password = $password;

        return $this;
    }

    /**
     * @since 2.0.0
     * {@inheritDoc}
     */
    public function withHost($host)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * @since 2.0.0
     * {@inheritDoc}
     */
    public function withPort($port)
    {
        $this->port = $port;

        return $this;
    }

    /**
     * @since 2.0.0
     * {@inheritDoc}
     */
    public function withPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * @since 2.0.0
     * {@inheritDoc}
     */
    public function withQuery($query)
    {
        $this->query = $query;

        return $this;
    }

    /**
     * @since 2.0.0
     * {@inheritDoc}
     */
    public function withFragment($fragment)
    {
        $this->fragment = $fragment;

        return $this;
    }

    /**
     * Parse DSN
     *
     * @since 2.0.0
     * @internal
     * @param string $dsn
     */
    protected function parseDsn($dsn)
    {
        /** @var array */
        $components = parse_url($dsn);

        $this->withScheme($components['scheme']);
        $this->withHost($components['host']);
        $this->withPort($components['port']);
        $this->withUserInfo($components['user'], $components['pass']);
    }
}
