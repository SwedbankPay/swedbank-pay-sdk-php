<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Client\Resource;

use TestCase;
use SwedbankPay\Api\Client\Resource\Client;

class ClientTest extends TestCase
{
    /**
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function testData()
    {
        $client = new Client();

        $this->assertInstanceOf(
            Client::class,
            $client->setVersion('test')
        );
        $this->assertEquals('test', $client->getVersion());

        $this->assertInstanceOf(
            Client::class,
            $client->setUserAgent('test')
        );
        $this->assertEquals('test', $client->getUserAgent());

        $this->assertInstanceOf(
            Client::class,
            $client->setAccessToken('test')
        );
        $this->assertEquals('test', $client->getAccessToken());

        $this->assertInstanceOf(
            Client::class,
            $client->setPayeeId('test')
        );
        $this->assertEquals('test', $client->getPayeeId());

        $this->assertInstanceOf(
            Client::class,
            $client->setMode('test')
        );
        $this->assertEquals('test', $client->getMode());

        $this->assertInstanceOf(
            Client::class,
            $client->setBaseUrl('test')
        );
        $this->assertEquals('test', $client->getBaseUrl());

        $this->assertInstanceOf(
            Client::class,
            $client->setCurlHandler(curl_init())
        );
        $this->assertNotNull($client->getCurlHandler());

        $this->assertInstanceOf(
            Client::class,
            $client->setSessionId('test')
        );
        $this->assertEquals('test', $client->getSessionId());

        $this->assertInstanceOf(
            Client::class,
            $client->setHeaders([])
        );
        $this->assertIsArray($client->getHeaders());

        $this->assertInstanceOf(
            Client::class,
            $client->setMethod('test')
        );
        $this->assertEquals('test', $client->getMethod());

        $this->assertInstanceOf(
            Client::class,
            $client->setEndpoint('test')
        );
        $this->assertEquals('test', $client->getEndpoint());

        $this->assertInstanceOf(
            Client::class,
            $client->setParams([])
        );
        $this->assertIsArray($client->getParams());

        $this->assertInstanceOf(
            Client::class,
            $client->setRequestBody('test')
        );
        $this->assertEquals('test', $client->getRequestBody());

        $this->assertInstanceOf(
            Client::class,
            $client->setResponseCode('test')
        );
        $this->assertEquals('test', $client->getResponseCode());

        $this->assertInstanceOf(
            Client::class,
            $client->setResponseBody('test')
        );
        $this->assertEquals('test', $client->getResponseBody());

        $this->assertInstanceOf(
            Client::class,
            $client->setDebugInfo('test')
        );
        $this->assertEquals('test', $client->getDebugInfo());

        $this->assertInstanceOf(
            Client::class,
            $client->setErrorCode('test')
        );
        $this->assertEquals('test', $client->getErrorCode());

        $this->assertInstanceOf(
            Client::class,
            $client->setErrorMessage('test')
        );
        $this->assertEquals('test', $client->getErrorMessage());
    }
}