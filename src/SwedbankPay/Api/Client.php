<?php
// phpcs:ignoreFile

namespace SwedbankPay\Api;

use SwedbankPay\Api\Client\Exception;
use SwedbankPay\Api\Response;

/**
 * Class Client
 * @note For backward compatibility for previous versions
 * @deprecated Use SwedbankPay\Api\Client\Client instead of
 * @package SwedbankPay\Api
 * @SuppressWarnings(PHPMD.CamelCasePropertyName)
 */
class Client
{
    const USER_AGENT = 'Swedbank Pay PHP SDK';
    const MODE_PRODUCTION = 'production';
    const MODE_TEST = 'test';

    /**
     * Version
     * @var string
     */
    protected $version;

    /**
     * Curl Handler
     *
     * @var resource
     */
    protected $curl;

    /**
     * @var string|null
     */
    protected $last_response;

    /**
     * Merchant Token
     *
     * @var string
     */
    protected $merchant_token = '';

    /**
     * Test Mode
     *
     * @var string
     */
    protected $mode = 'test';

    /**
     * Api Endpoint
     *
     * @var string
     */
    protected $api_endpoint = 'https://api.externalintegration.payex.com';

    /**
     * Platform String
     *
     * @var string
     */
    protected $platform = '';

    /**
     * Client constructor.
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    public function __construct()
    {
        $this->curl = curl_init();
        curl_setopt_array($this->curl, [
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_CAINFO         => \SwedbankPay\Api\Client\Client::getSystemCaRootBundlePath(),
            CURLOPT_TIMEOUT        => 60
        ]);
    }

    /**
     * Get Version
     *
     * @return string
     */
    public function getVersion()
    {
        if (empty($this->version)) {
            $data = json_decode(file_get_contents(__DIR__ . '/../../../composer.json'), true);
            $this->version = $data['version'];
        }

        return $this->version;
    }

    /**
     * Set Merchant Token
     *
     * @param $merchant_token
     * @SuppressWarnings(PHPMD.CamelCaseVariableName)
     * @SuppressWarnings(PHPMD.CamelCasePropertyName)
     * @SuppressWarnings(PHPMD.CamelCaseParameterName)
     */
    public function setMerchantToken($merchant_token)
    {
        $this->merchant_token = $merchant_token;
    }

    /**
     * Get Merchant Token
     *
     * @return string
     */
    public function getMerchantToken()
    {
        return $this->merchant_token;
    }

    /**
     * Set Mode
     *
     * @param $mode
     */
    public function setMode($mode)
    {
        $this->mode = $mode;
        $this->api_endpoint = 'https://api.externalintegration.payex.com';

        if ($this->mode === self::MODE_PRODUCTION) {
            $this->api_endpoint = 'https://api.payex.com';
        }
    }

    /**
     * Get Mode
     *
     * @return string
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * Set Platform
     *
     * @param $platform
     */
    public function setPlatform($platform)
    {
        $this->platform = $platform;
    }

    /**
     * Get Platform
     *
     * @return string
     */
    public function getPlatform()
    {
        return $this->platform;
    }

    /**
     * Get Last Response
     *
     * @return string|null
     */
    public function getLastResponse()
    {
        return $this->last_response;
    }

    /**
     * Set Last Response
     *
     * @param $lastResponse
     */
    public function setLastResponse($lastResponse)
    {
        $this->last_response = $lastResponse;
    }

    /**
     * Do Request
     *
     * @param       $method
     * @param       $url
     * @param array $params
     *
     * @return array|mixed|object
     * @throws Exception
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     * @SuppressWarnings(PHPMD.Superglobals)
     * @SuppressWarnings(PHPMD.CamelCaseVariableName)
     */
    public function request($method, $url, $params = array())
    {
        if (mb_substr($url, 0, 1, 'UTF-8') === '/') {
            $url = $this->api_endpoint . $url;
        }

        $remote_addr = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '127.0.0.1';
        $session_id  = sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
        $user_agent  = sprintf("%s/%s PHP/%s %s",
            self::USER_AGENT,
            $this->getVersion(),
            phpversion(),
            $this->platform
        );

        $headers = [
            'Accept: application/json',
            'Session-Id: ' . $session_id,
            'Forwarded: ' . $remote_addr,
            'Authorization:  Bearer ' . $this->merchant_token,
            'Content-Type: application/json'
        ];

        curl_setopt_array($this->curl, [
            CURLOPT_USERAGENT     => $user_agent,
            CURLOPT_HTTPHEADER    => $headers,
            CURLOPT_URL           => $url,
            CURLOPT_CUSTOMREQUEST => $method
        ]);

        if (count($params) > 0) {
            $data      = json_encode($params, JSON_PRETTY_PRINT);
            $headers[] = 'Content-Length: ' . strlen($data);

            curl_setopt($this->curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($this->curl, CURLOPT_HTTPHEADER, $headers);
        }

        $body = curl_exec($this->curl);
        $info = curl_getinfo($this->curl);
        $code = (int)($info['http_code'] / 100);

        // Set Last response
        $this->last_response = $body;

        switch ($code) {
            case 0:
                $error = curl_error($this->curl);
                $errno = curl_errno($this->curl);
                throw new Exception(sprintf('Error: %s. Code: %s.', $error, $errno));
            case 2:
            case 3:
                return new Response($body);
            case 4:
            case 5:
                throw new Exception(sprintf('API Error: %s. HTTP Code: %s', $body, $info['http_code']));
            default:
                throw new Exception(sprintf('Invalid HTTP Code: %s', $info['http_code']));
        }
    }

    /**
     * GET Request
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
     * DELETE Request
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
     * POST Request
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
     * PUT Request
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
     * PATCH Request
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
