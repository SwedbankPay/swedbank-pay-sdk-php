<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Creditcard\Transaction\Resource\Request;

use SwedbankPay\Api\Service\Creditcard\Transaction\Resource\Request\TransactionVerification;
use TestCase;

class TransactionVerificationTest extends TestCase
{
    public function testData()
    {
        $object = new TransactionVerification();

        $this->assertInstanceOf(
            TransactionVerification::class,
            $object->setCreditCardIssuer('test')
        );
        $this->assertEquals('test', $object->getCreditCardIssuer());
    }
}
