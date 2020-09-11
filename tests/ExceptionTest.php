<?php

use SwedbankPay\Api\Client\Exception as ClientException;

class ExceptionTest extends TestCase
{
    public function testExceptionUndefinedEnvironment()
    {
        $this->expectException(ClientException::class);

        // Set empty token
        $this->client->setMerchantToken('');
        $this->client->request('POST', '/psp/creditcard/payments', []);
    }
}
