<?php

class ExceptionTest extends TestCase
{
    public function testExceptionUndefinedEnvironment()
    {
        // Set empty token
        $this->client->setMerchantToken('');

        $e = null;
        try {
            $result = $this->client->request('POST', '/psp/creditcard/payments', array());
        } catch (\SwedbankPay\Api\Client\Exception $e) {
            //
        }

        $this->assertInstanceOf('\SwedbankPay\Api\Client\Exception', $e);
    }
}
