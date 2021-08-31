<?php

namespace SwedbankPayTest\Api\Service\Payment\Transaction\Resource\Response;

use TestCase;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\VerificationsObject;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\VerificationsObjectInterface;
//use SwedbankPay\Api\Service\Creditcard\Transaction\Resource\Response\Verifications;

class VerificationsObjectTest extends TestCase
{
    public function testData()
    {
        $this->markTestSkipped('Object instance of VerificationsObjectInterface hasn\'t implemented yet');

        // @todo Object instance of TransactionsObjectInterface hasn't implemented yet
        $object = new VerificationsObject();
        $transactions = new Verifications();

        $this->assertInstanceOf(
            VerificationsObject::class,
            $object->setVerifications($transactions)
        );
        $this->assertInstanceOf(Verifications::class, $object->getVerifications());
    }
}
