<?php

namespace PayEx;

class PaymentTest extends TestCase
{
    public function testInitialize()
    {
        // Call PxOrder.Initialize8
        $params = [
            'accountNumber' => '',
            'purchaseOperation' => 'AUTHORIZATION',
            'price' => round(1 * 100),
            'priceArgList' => '',
            'currency' => 'USD',
            'vat' => 0,
            'orderID' => '10000001',
            'productNumber' => '10000001',
            'description' => 'Test Order (phpunit)',
            'clientIPAddress' => '127.0.0.1',
            'clientIdentifier' => 'USERAGENT=PHPUNIT',
            'additionalValues' => 'NO3DS=true',
            'externalID' => '',
            'returnUrl' => 'http://localhost.no/return',
            'view' => 'CREDITCARD',
            'agreementRef' => '',
            'cancelUrl' => 'http://localhost.no/cancel',
            'clientLanguage' => 'en-US'
        ];
        $result = $this->px->Initialize8($params);

        // Array Check
        $this->assertInternalType('array', $result);

        // Response Check
        $this->assertTrue($result['code'] === 'OK' && $result['description'] === 'OK' && $result['errorCode'] === 'OK');

        // Result Check
        $this->assertTrue(isset($result['orderRef']));
        $this->assertTrue(isset($result['redirectUrl']));
    }
}
