<?php

namespace PayEx\Api\Client;

use PayEx\Api\Client\Resource\Client as ClientResource;

/**
 * Class Client
 * @package PayEx\Api\Client
 * @SuppressWarnings(PHPMD.ExcessiveClassComplexity)
 */
class Client extends ClientResource
{
    /**
     * Client Name
     */
    const CLIENT_NAME = 'PayEx HTTP Client';

    /**
     * Client Version
     */
    const CLIENT_VERSION = '3.0.0';

    /**
     * Mode Test
     */
    const MODE_TEST = 'test';

    /**
     * Mode Production
     */
    const MODE_PRODUCTION = 'production';

    /**
     * Test API URL
     */
    const MODE_TEST_URL = 'https://api.externalintegration.payex.com';

    /**
     * Production API URL
     */
    const MODE_PRODUCTION_URL = 'https://api.payex.com';

    /**
     * Client constructor
     *
     * @param array $data
     * @throws Exception
     */
    public function __construct($data = [])
    {
        $this->setMode();

        $this->setSessionId(
            sprintf(
                '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                mt_rand(0, 0xffff),
                mt_rand(0, 0xffff),
                mt_rand(0, 0xffff),
                mt_rand(0, 0x0fff) | 0x4000,
                mt_rand(0, 0x3fff) | 0x8000,
                mt_rand(0, 0xffff),
                mt_rand(0, 0xffff),
                mt_rand(0, 0xffff)
            )
        );

        $this->setUserAgent(
            sprintf(
                "%s/%s PHP/%s %s",
                self::CLIENT_NAME,
                self::CLIENT_VERSION,
                phpversion(),
                $this->getPlatform()
            )
        );

        $this->setHeaders();

        $this->setCurlHandler(curl_init());

        curl_setopt_array($this->getCurlHandler(), [
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_TIMEOUT => 60
        ]);

        parent::__construct(array_merge($this->__toArray(), $data));
    }

    /**
     * Set Mode
     *
     * @param $mode
     * @return $this
     * @throws Exception
     */
    public function setMode($mode = self::MODE_TEST)
    {
        if ($mode != '' && $mode != self::MODE_TEST && $mode != self::MODE_PRODUCTION) {
            throw new Exception('Invalid mode: ' . $mode);
        }

        $this->offsetSet(self::MODE, $mode);

        if ($this->getMode() === self::MODE_PRODUCTION) {
            $this->offsetSet(self::BASE_URL, self::MODE_PRODUCTION_URL);
            return $this;
        }

        $this->offsetSet(self::BASE_URL, self::MODE_TEST_URL);
        return $this;
    }

    /**
     * Get Remote IP Address
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     *
     * @return string
     */
    protected function getRemoteAddr()
    {
        return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '127.0.0.1';
    }

    /**
     * Get Client Host Platform
     *
     * @return string
     */
    protected function getPlatform()
    {
        $platform = "Unknown OS Platform";
        $platformArray = array(
            '/windows nt 10/i' => 'Windows 10',
            '/windows nt 6.3/i' => 'Windows 8.1',
            '/windows nt 6.2/i' => 'Windows 8',
            '/windows nt 6.1/i' => 'Windows 7',
            '/windows nt 6.0/i' => 'Windows Vista',
            '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
            '/windows nt 5.1/i' => 'Windows XP',
            '/windows xp/i' => 'Windows XP',
            '/windows nt 5.0/i' => 'Windows 2000',
            '/windows me/i' => 'Windows ME',
            '/win98/i' => 'Windows 98',
            '/win95/i' => 'Windows 95',
            '/win16/i' => 'Windows 3.11',
            '/macintosh|mac os x|darwin/i' => 'Mac OS X',
            '/mac_powerpc/i' => 'Mac OS 9',
            '/linux/i' => 'Linux',
            '/ubuntu/i' => 'Ubuntu',
            '/iphone/i' => 'iPhone',
            '/ipod/i' => 'iPod',
            '/ipad/i' => 'iPad',
            '/android/i' => 'Android',
            '/blackberry/i' => 'BlackBerry',
            '/webos/i' => 'Mobile'
        );

        foreach ($platformArray as $regex => $value) {
            if (preg_match($regex, PHP_OS)) {
                $platform = $value;
            }
        }

        return $platform;
    }

    /**
     * Set Headers
     *
     * @param array $headers
     * @return $this
     */
    public function setHeaders($headers = [])
    {
        $default = [
            'Accept: application/json',
            'Session-Id: ' . $this->getSessionId(),
            'Forwarded: for=' . $this->getRemoteAddr() . '; proto=https',
            'Authorization:  Bearer ' . $this->getMerchantToken(),
            'Content-Type: application/json; charset=utf-8'
        ];
        $headers = array_merge($default, (array)$headers);
        return $this->offsetSet(self::HEADERS, $headers);
    }

    /**
     * Extract keys and values from Data URL path
     * @param string $urlPath
     * @return array
     */
    protected function extractURLPathData($urlPath = '')
    {
        $parts = explode('/', $urlPath);
        $keys = [];
        $values = [];
        foreach ($parts as $i => $epPart) {
            if ($i % 2 == 0) {
                $keys[] = $epPart;
                continue;
            }
            $values[] = $epPart;
        }

        return ['keys' => $keys, 'values' => $values];
    }

    /**
     * Build Data URL Path from Data set of keys and values
     * @param array $keys
     * @param array $values
     * @return bool|string
     */
    protected function buildURLPath($keys = [], $values = [])
    {
        $path = '';

        foreach (array_reverse($keys) as $key) {
            $key = trim((string)$key, '/');

            if (isset($values[$key])) {
                $values[$key] = trim((string)$values[$key], '/');
                $path = $values[$key] . '/' . $path;
            }

            if (strpos($path, $key . '/') === 0) {
                $path = substr($path, strlen($key) + 1);
            }

            $path = rtrim($key . '/' . $path, '/');
        }

        return $path;
    }

    /**
     * Generate complete endpoint URI for supplied endpoint slug, endpoint values and query parameters
     * @param string|array $endPoint
     * @param array $epValues
     * @param array $queryParams
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     * @return string
     */
    protected function generateRequestURI($endPoint = '', $epValues = [], $queryParams = [])
    {
        $path = '';
        $epKeys = [];

        if (is_array($queryParams) && count($queryParams) > 0) {
            $path .=  '?' . http_build_query($queryParams);
        }

        if (empty($endPoint) && empty($epValues)) {
            return $path;
        }

        if (is_array($endPoint)) {
            $epKeys = $endPoint;
            $endPoint = '';
        }

        $endPoint = (string)$endPoint;
        if (strpos($endPoint, '%') !== false && !empty($epValues)) {
            return vsprintf($endPoint, $epValues) . '/' . $path;
        }

        if (is_array($epValues) && count($epValues) > 0) {
            $epKeys = array_keys($epValues);
            if (array_keys($epValues) === range(0, count($epValues) - 1)) {
                list($epKeys, $epValues) = $this->extractURLPathData($this->buildURLPath($epValues));
            }
        }

        if (empty($epKeys)) {
            $epKeys = explode('/', $endPoint);
            return $this->buildURLPath($epKeys, $epValues) . '/' . $path;
        }

        return $endPoint . '/' . $this->buildURLPath($epKeys, $epValues) . '/' . $path;
    }

    /**
     * Generate Client Body
     *
     * @param string|array|object $requestParams
     * @return string
     */
    protected function generateRequestBody($requestParams = [])
    {
        $requestBody = '';

        switch (gettype($requestParams)) {
            case 'object':
                if (method_exists($requestParams, '__toJson')) {
                    $requestBody = $requestParams->__toJson();
                    break;
                }
                if ($requestBody == '' && method_exists($requestParams, '__toArray')) {
                    $requestBody = json_encode($requestParams->__toArray(), JSON_PRETTY_PRINT);
                    break;
                }
                $requestBody = json_encode(get_object_vars($requestParams), JSON_PRETTY_PRINT);
                break;
            /** @noinspection PhpMissingBreakStatementInspection */
            case 'string':
                if ($requestParams != '') {
                    json_decode($requestParams);
                    if (json_last_error() == JSON_ERROR_NONE) {
                        $requestBody = $requestParams;
                        break;
                    }
                }
                // no break
            case 'array':
                $requestBody = json_encode((array)$requestParams, JSON_PRETTY_PRINT);
                break;
        }

        return $requestBody;
    }

    /**
     * Process Client Result
     *
     * @return $this
     * @throws Exception
     */
    protected function processRequestResult()
    {
        $debugMsgFormat = sprintf(
            "\n>>>>>>>> BEGIN PAYEX API CLIENT REQUEST DEBUG INFO >>>>>>>>\n\n" .
            "Request Method: %s\n" .
            "Request URL: %s\n" .
            "Request Headers: %s\n" .
            "Request Body:\n%s\n\n" .
            "Response Code: %s\n" .
            "Response Body:\n%s\n\n" .
            "<<<<<<<< END PAYEX API CLIENT REQUEST DEBUG INFO <<<<<<<<\n\n",
            $this->getMethod(),
            $this->getBaseUrl() . $this->getEndpoint(),
            implode("\n", (array)$this->getHeaders()),
            implode("\n", (array)$this->getRequestBody()),
            "%s",
            "%s"
        );

        if ($this->getErrorCode()) {
            $this->setDebugInfo(
                sprintf(
                    $debugMsgFormat,
                    $this->getErrorCode(),
                    $this->getErrorMessage()
                )
            );
            throw new Exception($this->getDebugInfo());
        }

        $this->setDebugInfo(
            sprintf(
                $debugMsgFormat,
                $this->getResponseCode(),
                trim($this->getResponseBody())
            )
        );

        return $this;
    }

    /**
     * Do Client
     *
     * @param       $requestMethod
     * @param       $requestEndpoint
     * @param string|array|object $requestParams
     *
     * @return array|mixed|object
     * @throws Exception
     */
    public function request($requestMethod, $requestEndpoint, $requestParams = [])
    {
        $this->setMethod($requestMethod);
        $this->setEndpoint($requestEndpoint);
        $this->setParams($requestParams);
        $requestBody = '';

        if ($this->getMethod() == "GET") {
            $this->setHeaders();
            $this->setEndpoint(
                $this->generateRequestURI(
                    $this->getEndpoint(),
                    $this->getParams()
                )
            );
        }

        if ($this->getMethod() != "GET") {
            $requestBody = $this->generateRequestBody($this->getParams());
            $this->setHeaders(['Content-Length: ' . strlen($requestBody)]);
        }

        curl_setopt_array($this->getCurlHandler(), [
            CURLOPT_USERAGENT     => $this->getUserAgent(),
            CURLOPT_HTTPHEADER    => $this->getHeaders(),
            CURLOPT_URL           => $this->getBaseUrl() . $this->getEndpoint(),
            CURLOPT_CUSTOMREQUEST => $this->getMethod()
        ]);

        $this->setRequestBody($requestBody);

        curl_setopt($this->getCurlHandler(), CURLOPT_HTTPHEADER, $this->getHeaders());
        curl_setopt($this->getCurlHandler(), CURLOPT_POSTFIELDS, $this->getRequestBody());

        $this->setResponseBody(curl_exec($this->getCurlHandler()));

        $info = curl_getinfo($this->getCurlHandler());
        $this->setResponseCode((int)$info['http_code']);
        $codeClass = (int)($this->getResponseCode() / 100);

        switch ($codeClass) {
            case 0:
                $this->setErrorCode(curl_errno($this->getCurlHandler()));
                $this->setErrorMessage(curl_error($this->getCurlHandler()));
                return $this->processRequestResult();
            case 4:
            case 5:
                $this->setErrorCode($this->getResponseCode());
                $this->setErrorMessage($this->getResponseBody());
                return $this->processRequestResult();
        }

        json_decode($this->getResponseBody());
        if (json_last_error() != JSON_ERROR_NONE) {
            $this->setErrorCode(json_last_error());
            $this->setErrorMessage(json_last_error_msg());
            return $this->processRequestResult();
        }

        return $this->processRequestResult();
    }

    /**
     * GET Client
     *
     * @param $url
     *
     * @return array|mixed|object
     * @throws Exception
     */
    public function get($url)
    {
        return $this->request('GET', $url);
    }

    /**
     * DELETE Client
     *
     * @param $url
     *
     * @return array|mixed|object
     * @throws Exception
     */
    public function delete($url)
    {
        return $this->request('DELETE', $url);
    }

    /**
     * POST Client
     *
     * @param       $url
     * @param array $params
     *
     * @return array|mixed|object
     * @throws Exception
     */
    public function post($url, $params = array())
    {
        return $this->request('POST', $url, $params);
    }

    /**
     * PUT Client
     *
     * @param       $url
     * @param array $params
     *
     * @return array|mixed|object
     * @throws Exception
     */
    public function put($url, $params = array())
    {
        return $this->request('PUT', $url, $params);
    }

    /**
     * PATCH Client
     *
     * @param       $url
     * @param array $params
     *
     * @return array|mixed|object
     * @throws Exception
     */
    public function patch($url, $params = array())
    {
        return $this->request('PATCH', $url, $params);
    }
}
