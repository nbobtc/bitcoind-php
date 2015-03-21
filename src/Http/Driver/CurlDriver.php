<?php
/**
 */

namespace Nbobtc\Http\Driver;

use Psr\Http\Message\UriInterface;
use Psr\Http\Message\RequestInterface;
use Nbobtc\Http\Message\Response;

/**
 */
class CurlDriver implements DriverInterface
{
    /**
     * @var resource
     */
    protected static $ch;

    /**
     * @var array
     */
    protected $curlOptions = array();

    /**
     */
    public function __destruct()
    {
        if (null !== self::$ch) {
            curl_close(self::$ch);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function execute(RequestInterface $request)
    {
        if (null === self::$ch) {
            self::$ch = curl_init();
        }
        $uri = $request->getUri();
        curl_setopt(self::$ch, CURLOPT_URL, sprintf('%s://%s@%s', $uri->getScheme(), $uri->getUserInfo(), $uri->getHost()));
        curl_setopt(self::$ch, CURLOPT_PORT, $uri->getPort());

        $headers = array();
        foreach ($request->getHeaders() as $header => $values) {
            $headers[] = $header.': '.implode(', ', $values);
        }
        curl_setopt(self::$ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt_array(self::$ch, array_merge($this->getDefaultCurlOptions(), $this->curlOptions));
        curl_setopt(self::$ch, CURLOPT_POSTFIELDS, $request->getBody()->getContents());

        $result = curl_exec(self::$ch);
        $info   = curl_getinfo(self::$ch);
        $error  = curl_error(self::$ch);

        $response = new Response();
        $response->withStatus($info['http_code']);
        $response->getBody()->write($result);

        return $response;
    }

    /**
     * @param integer $option
     * @param mixed   $value
     */
    public function addCurlOption($option, $value)
    {
        $this->curlOptions[$option] = $value;

        return $this;
    }

    /**
     * @return array
     */
    protected function getDefaultCurlOptions()
    {
        return array(
            CURLOPT_POST           => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CONNECTTIMEOUT => 5,
            CURLOPT_TIMEOUT        => 10,
        );
    }
}
