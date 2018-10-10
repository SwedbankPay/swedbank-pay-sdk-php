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
        } catch (\PayEx\Api\Exception $e) {
            //
        }

        $this->assertInstanceOf('\PayEx\Api\Exception', $e);
    }
}
