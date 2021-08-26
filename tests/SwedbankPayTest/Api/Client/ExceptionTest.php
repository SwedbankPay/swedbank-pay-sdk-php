<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Client;

use TestCase;
use SwedbankPay\Api\Client\Exception as ClientException;

class ExceptionTest extends TestCase
{
    public function testExceptionUndefinedEnvironment()
    {
        $this->expectException(ClientException::class);

        // Set empty token
        $this->client->setAccessToken('');
        $this->client->request('POST', '/psp/creditcard/payments', []);
    }
}
