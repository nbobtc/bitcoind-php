<?php

namespace Nbobtc\Bitcoind;

/**
 * @author Joshua Estes
 */ 
class Client
{

    /**
     * @var string
     */
    protected $dsn;

    /**
     * @param string|null $dsn
     */
    public function __construct($dsn = null)
    {
        $this->dsn = $dsn;
    }

    /**
     * @param string $dsn
     * @return Client
     */
    public function setDsn($dsn)
    {
        $this->dsn = $dsn;
        return $this;
    }

    /**
     * @param string       $method
     * @param string|array $params
     * @param string       $id
     * @throw Exception
     * @return StdClass
     */
    public function execute($method, $params = null, $id = null)
    {
        $ch  = curl_init($this->dsn);

        if (null === $params) {
            $params = array();
        } elseif (!empty($params) && !is_array($params)) {
            $params = array($params);
        }

        $json = json_encode(array('method' => $method, 'params' => $params, 'id' => $id));
        curl_setopt_array($ch, array(
                CURLOPT_POST           => true,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER     => array('Content-type: application/json'),
                CURLOPT_POSTFIELDS     => $json,
            ));
        $response = curl_exec($ch);
        curl_close($ch);

        if (false === $response) {
            throw new \Exception('The server is not available.');
        }

        $stdClass = json_decode($response);

        if (!empty($stdClass->error)) {
            throw new \Exception($stdClass->error->message, $stdClass->error->code);
        }

        return $stdClass;
    }

}
