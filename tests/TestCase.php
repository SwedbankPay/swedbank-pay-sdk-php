<?php

class TestCase extends \PHPUnit\Framework\TestCase
{
    /** @var \PayEx\Api\Client */
    protected $client;

    protected function setUp()
    {
        if (!defined('MERCHANT_TOKEN') ||
            !defined('PAYEE_ID'))
        {
            $this->fail('Test failed: Constants are not defined');
        }

        $this->client = new \PayEx\Api\Client();
        $this->client->setMerchantToken(MERCHANT_TOKEN);
        $this->client->setMode(\PayEx\Api\Client::MODE_TEST);
    }

    protected function tearDown()
    {
        $this->client = null;
    }
}
