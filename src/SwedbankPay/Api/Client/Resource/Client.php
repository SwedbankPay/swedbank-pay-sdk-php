<?php

namespace SwedbankPay\Api\Client\Resource;

use SwedbankPay\Api\Client\Resource\Data\ClientInterface;
use SwedbankPay\Framework\AbstractDataTransferObject;

class Client extends AbstractDataTransferObject implements ClientInterface
{
    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->offsetGet(self::CLIENT_VERSION);
    }

    /**
     * @param string $version
     * @return $this
     */
    public function setVersion($version)
    {
        return $this->offsetSet(self::CLIENT_VERSION, $version);
    }

    /**
     * @return string
     */
    public function getUserAgent()
    {
        return $this->offsetGet(self::USER_AGENT);
    }

    /**
     * @param string $userAgent
     * @return $this
     */
    public function setUserAgent($userAgent)
    {
        return $this->offsetSet(self::USER_AGENT, $userAgent);
    }

    /**
     * @return string
     */
    public function getMerchantToken()
    {
        return $this->offsetGet(self::MERCHANT_TOKEN);
    }

    /**
     * @param string $merchantToken
     * @return $this
     */
    public function setMerchantToken($merchantToken)
    {
        return $this->offsetSet(self::MERCHANT_TOKEN, $merchantToken);
    }

    /**
     * @return string
     */
    public function getPayeeId()
    {
        return $this->offsetGet(self::PAYEE_ID);
    }

    /**
     * @param string $payeeId
     * @return $this
     */
    public function setPayeeId($payeeId)
    {
        return $this->offsetSet(self::PAYEE_ID, $payeeId);
    }

    /**
     * @return string
     */
    public function getMode()
    {
        return $this->offsetGet(self::MODE);
    }

    /**
     * @param string $mode
     * @return $this
     */
    public function setMode($mode)
    {
        return $this->offsetSet(self::MODE, $mode);
    }

    /**
     * @return string
     */
    public function getBaseUrl()
    {
        return $this->offsetGet(self::BASE_URL);
    }

    /**
     * @param string $baseUrl
     * @return $this
     */
    public function setBaseUrl($baseUrl)
    {
        return $this->offsetSet(self::BASE_URL, $baseUrl);
    }

    /**
     * @return resource
     */
    public function getCurlHandler()
    {
        return $this->offsetGet(self::CURL_HANDLER);
    }

    /**
     * @param resource $curlHandler
     * @return $this
     */
    public function setCurlHandler($curlHandler)
    {
        return $this->offsetSet(self::CURL_HANDLER, $curlHandler);
    }

    /**
     * @return string
     */
    public function getSessionId()
    {
        return $this->offsetGet(self::SESSION_ID);
    }

    /**
     * @param string $sessionId
     * @return $this
     */
    public function setSessionId($sessionId)
    {
        return $this->offsetSet(self::SESSION_ID, $sessionId);
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->offsetGet(self::HEADERS);
    }

    /**
     * @param array $headers
     * @return $this
     */
    public function setHeaders($headers)
    {
        return $this->offsetSet(self::HEADERS, $headers);
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->offsetGet(self::METHOD);
    }

    /**
     * @param string $method
     * @return $this
     */
    public function setMethod($method)
    {
        return $this->offsetSet(self::METHOD, $method);
    }

    /**
     * @return string
     */
    public function getEndpoint()
    {
        return $this->offsetGet(self::ENDPOINT);
    }

    /**
     * @param string $endpoint
     * @return $this
     */
    public function setEndpoint($endpoint)
    {
        return $this->offsetSet(self::ENDPOINT, $endpoint);
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->offsetGet(self::PARAMS);
    }

    /**
     * @param string|array|object $params
     * @return $this
     */
    public function setParams($params = [])
    {
        return $this->offsetSet(self::PARAMS, $params);
    }

    /**
     * @return string
     */
    public function getRequestBody()
    {
        return $this->offsetGet(self::REQUEST_BODY);
    }

    /**
     * @param string $requestBody
     * @return $this
     */
    public function setRequestBody($requestBody)
    {
        return $this->offsetSet(self::REQUEST_BODY, $requestBody);
    }

    /**
     * @return string
     */
    public function getResponseCode()
    {
        return $this->offsetGet(self::RESPONSE_CODE);
    }

    /**
     * @param string $responseCode
     * @return $this
     */
    public function setResponseCode($responseCode)
    {
        return $this->offsetSet(self::RESPONSE_CODE, $responseCode);
    }

    /**
     * @return string
     */
    public function getResponseBody()
    {
        return $this->offsetGet(self::RESPONSE_BODY);
    }

    /**
     * @param string $responseBody
     * @return $this
     */
    public function setResponseBody($responseBody)
    {
        return $this->offsetSet(self::RESPONSE_BODY, $responseBody);
    }

    /**
     * @return string
     */
    public function getDebugInfo()
    {
        return $this->offsetGet(self::DEBUG_INFO);
    }

    /**
     * @param string $debugInfo
     * @return $this
     */
    public function setDebugInfo($debugInfo)
    {
        return $this->offsetSet(self::DEBUG_INFO, $debugInfo);
    }

    /**
     * @return string|integer
     */
    public function getErrorCode()
    {
        return $this->offsetGet(self::ERROR_CODE);
    }

    /**
     * @param string|integer $errorCode
     * @return $this
     */
    public function setErrorCode($errorCode)
    {
        return $this->offsetSet(self::ERROR_CODE, $errorCode);
    }

    /**
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->offsetGet(self::ERROR_MESSAGE);
    }

    /**
     * @param string $errorMessage
     * @return $this
     */
    public function setErrorMessage($errorMessage)
    {
        return $this->offsetSet(self::ERROR_MESSAGE, $errorMessage);
    }
}
