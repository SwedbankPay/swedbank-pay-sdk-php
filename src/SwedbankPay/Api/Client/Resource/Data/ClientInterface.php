<?php

namespace SwedbankPay\Api\Client\Resource\Data;

interface ClientInterface
{
    const CLIENT_VERSION = 'client_version';
    const USER_AGENT = 'user_agent';
    const MERCHANT_TOKEN = 'merchant_token';
    const PAYEE_ID = 'payee_id';

    const MODE = 'mode';
    const BASE_URL = 'base_url';

    const CURL_HANDLER = 'curl_handler';

    const SESSION_ID = 'session_id';
    const HEADERS = 'headers';
    const METHOD = 'method';
    const ENDPOINT = 'endpoint';
    const PARAMS = 'params';
    const REQUEST_BODY = 'request_body';
    const RESPONSE_CODE = 'response_code';
    const RESPONSE_BODY = 'response_body';

    const DEBUG_INFO = 'debug_info';
    const ERROR_CODE = 'error_code';
    const ERROR_MESSAGE = 'error_message';

    /**
     * @return string
     */
    public function getUserAgent();

    /**
     * @param string $userAgent
     * @return $this
     */
    public function setUserAgent($userAgent);

    /**
     * @return string
     */
    public function getMerchantToken();

    /**
     * @param string $merchantToken
     * @return $this
     */
    public function setMerchantToken($merchantToken);

    /**
     * @return string
     */
    public function getPayeeId();

    /**
     * @param string $payeeId
     * @return $this
     */
    public function setPayeeId($payeeId);

    /**
     * @return string
     */
    public function getMode();

    /**
     * @param string $mode
     * @return $this
     */
    public function setMode($mode);

    /**
     * @return string
     */
    public function getBaseUrl();

    /**
     * @param string $url
     * @return $this
     */
    public function setBaseUrl($url);

    /**
     * @return resource
     */
    public function getCurlHandler();

    /**
     * @param resource $curlHandler
     * @return $this
     */
    public function setCurlHandler($curlHandler);

    /**
     * @return string
     */
    public function getSessionId();

    /**
     * @param string $sessionId
     * @return $this
     */
    public function setSessionId($sessionId);

    /**
     * @return array
     */
    public function getHeaders();

    /**
     * @param array $headers
     * @return $this
     */
    public function setHeaders($headers);

    /**
     * @return string
     */
    public function getMethod();

    /**
     * @param string $method
     * @return $this
     */
    public function setMethod($method);

    /**
     * @return string
     */
    public function getEndpoint();

    /**
     * @param string $endpoint
     * @return $this
     */
    public function setEndpoint($endpoint);

    /**
     * @return array
     */
    public function getParams();

    /**
     * @param string|array|object $params
     * @return $this
     */
    public function setParams($params = []);

    /**
     * @return string
     */
    public function getRequestBody();

    /**
     * @param string $requestBody
     * @return $this
     */
    public function setRequestBody($requestBody);

    /**
     * @return string
     */
    public function getResponseCode();

    /**
     * @param string $responseCode
     * @return $this
     */
    public function setResponseCode($responseCode);

    /**
     * @return string
     */
    public function getResponseBody();

    /**
     * @param string $responseBody
     * @return $this
     */
    public function setResponseBody($responseBody);

    /**
     * @return string
     */
    public function getDebugInfo();

    /**
     * @param string $debugInfo
     * @return $this
     */
    public function setDebugInfo($debugInfo);

    /**
     * @return string|integer
     */
    public function getErrorCode();

    /**
     * @param string|integer $errorCode
     * @return $this
     */
    public function setErrorCode($errorCode);

    /**
     * @return string
     */
    public function getErrorMessage();

    /**
     * @param string $errorMessage
     * @return $this
     */
    public function setErrorMessage($errorMessage);
}
