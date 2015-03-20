<?php
/**
 */

namespace Nbobtc\Http;

/**
 */
class Client implements ClientInterface
{
    /**
     * Schema - HTTPS or HTTP
     *
     * @var string
     */
    protected $schema;

    /**
     * Username
     *
     * @var string
     */
    protected $user;

    /**
     * Password
     *
     * @var string
     */
    protected $pass;

    /**
     * Host
     *
     * @var string
     */
    protected $host;

    /**
     * Port
     *
     * @var string
     */
    protected $port;

    /**
     * Data Source Name
     *
     * @var string
     */
    protected $dsn;

    /**
     * CA Certificate
     *
     * @var string
     */
    protected $cacert;

    /**
     * @param string|null $dsn
     * @param string|null $cert The file path to a certificate you'd like to use for SSL verification
     */
    public function __construct($dsn = null, $cacert = null)
    {
        if (null !== $dsn) {
            $this->setDsn($dsn);
        }

        if (null !== $cacert) {
            $this->setCacert($cacert);
        }
    }

    /**
     * Returns the Data Source Name
     *
     * @return string
     */
    public function getDsn()
    {
        return sprintf('%s://%s:%s@%s:%s', $this->getSchema(), $this->getUser(), $this->getPass(), $this->getHost(), $this->getPort());
    }

    /**
     * @return string
     */
    public function getSchema()
    {
        return $this->schema;
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @return string
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * Setting the dsn will populate schema, user, pass, host, and port
     *
     * @param string $dsn
     * @throws \Exception
     * @return self
     */
    public function setDsn($dsn)
    {
        $this->dsn = $dsn;
        $uriInfo   = parse_url($dsn);

        if (false === $uriInfo) {
            throw new \Exception('Invalid DSN');
        }

        if (isset($uriInfo['schema'])) {
            $this->setSchema($uriInfo['schema']);
        }

        if (isset($uriInfo['user'])) {
            $this->setUser($uriInfo['user']);
        }

        if (isset($uriInfo['pass'])) {
            $this->setPass($uriInfo['pass']);
        }

        if (isset($uriInfo['host'])) {
            $this->setHost($uriInfo['host']);
        }

        if (isset($uriInfo['port'])) {
            $this->setPort($uriInfo['port']);
        }

        return $this;
    }

    /**
     * @param string $cacert
     * @return self
     */
    public function setCacert($cacert)
    {
        $this->cacert = $cacert;

        return $this;
    }

    /**
     * @param string $schema
     * @return self
     */
    public function setScheam($schema)
    {
        $this->schema = $schema;

        return $this;
    }

    /**
     * @param string $user
     * @return self
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @param string $pass
     * @return self
     */
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * @param string $host
     * @return self
     */
    public function setHost($host)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * @param string $port
     * @return self
     */
    public function setPort($port)
    {
        $this->port = $port;

        return $this;
    }

    /**
     * @param string       $method
     * @param string|array $params
     * @param string       $id
     * @throw Exception
     * @return array
     */
    public function execute($method, $params = null, $id = null)
    {
        $ch = curl_init($this->getDsn());

        if (!is_array($params)) {
            $params = array($params);
        }

        $json = json_encode(array('method' => $method, 'params' => $params, 'id' => $id));
        curl_setopt_array($ch, array(
            CURLOPT_POST           => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER     => array('Content-type: application/json'),
            CURLOPT_POSTFIELDS     => $json,
            CURLOPT_CONNECTTIMEOUT => 10,
            CURLOPT_TIMEOUT        => 60,
        ));

        if ($this->cacert) {
            curl_setopt($ch, CURLOPT_CAINFO, $this->cacert);
        }

        $response = json_decode(curl_exec($ch), true);
        $status   = curl_getinfo($ch);
        curl_close($ch);

        if (null === $response || false === $response) {
            throw new \Exception('The server is not available.');
        }

        if ($status['http_code'] != 200) {
            if (!empty($response['error']['message']) && !empty($response['error']['code'])) {
                throw new \Exception($response['error']['message'], $response['error']['code']);
            }

            throw new \Exception('The server status code is '.$status['http_code'].'.');
        }

        return $response;
    }
}
