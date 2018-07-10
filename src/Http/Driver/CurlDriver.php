<?php
/**
 * @author Joshua Estes
 * @copyright 2012-2015 Joshua Estes
 * @license https://github.com/nbobtc/bitcoind-php/blob/2.x/LICENSE MIT
 */

namespace Nbobtc\Http\Driver;

use Psr\Http\Message\RequestInterface;
use Zend\Diactoros\Response;

/**
 * Uses cURL to send Requests
 *
 * @since 2.0.0
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
     * @since 2.0.0
     */
    public function __destruct()
    {
        if (null !== self::$ch) {
            curl_close(self::$ch);
            self::$ch = null; // Nulling to avoid calling curl_close again
        }
    }

    /**
     * @since 2.0.0
     * {@inheritDoc}
     */
    public function execute(RequestInterface $request)
    {
        $uri = $request->getUri();

        if (null === self::$ch || gettype(self::$ch) != 'curl') {
            self::$ch = curl_init();
        }

        curl_setopt_array(self::$ch, $this->getDefaultCurlOptions());

        curl_setopt(self::$ch, CURLOPT_URL, sprintf('%s://%s@%s', $uri->getScheme(), $uri->getUserInfo(), $uri->getHost()));
        curl_setopt(self::$ch, CURLOPT_PORT, $uri->getPort());

        $headers = array();
        foreach ($request->getHeaders() as $header => $values) {
            $headers[] = $header.': '.implode(', ', $values);
        }
        curl_setopt(self::$ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt(self::$ch, CURLOPT_POSTFIELDS, (string) $request->getBody());

        // Allows user to override any option, may cause errors
        curl_setopt_array(self::$ch, $this->curlOptions);

        /** @var string|false */
        $result = curl_exec(self::$ch);
        /** @var array|false */
        $info = curl_getinfo(self::$ch);
        /** @var string */
        $error = curl_error(self::$ch);

        if (!empty($error)) {
            // user can catch the error rather than return error 500 if your bitcoin server went down
            return new \Exception($error);
        }

        $response = new Response();

        $response = $response->withStatus($info['http_code']);

        $response->getBody()->write($result);
        $response->getBody()->rewind(); // empty getContents() without rewind()

        return $response;
    }

    /**
     * Add options to use for cURL requests
     *
     * @since 2.0.0
     * @param integer $option
     * @param mixed   $value
     */
    public function addCurlOption($option, $value)
    {
        $this->curlOptions[$option] = $value;

        return $this;
    }

    /**
     * Returns an array of cURL options
     *
     * @since 2.0.0
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
