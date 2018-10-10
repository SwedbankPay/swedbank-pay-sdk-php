<?php

class TestCase extends \PHPUnit\Framework\TestCase
{
    /** @var \PayEx\Api\Client */
    protected $client;

    protected function setUp()
    {
        if (!defined('MERCHANT_TOKEN') ||
            MERCHANT_TOKEN === '<merchant_token>')
        {
            $this->fail('MERCHANT_TOKEN not configured in INI file or environment variable.');
        }

        if (!defined('PAYEE_ID') ||
            PAYEE_ID === '<payee_id>')
        {
            $this->fail('PAYEE_ID not configured in INI file or environment variable.');
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
