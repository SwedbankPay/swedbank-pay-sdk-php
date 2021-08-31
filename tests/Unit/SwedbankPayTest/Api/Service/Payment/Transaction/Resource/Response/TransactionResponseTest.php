<?php

namespace SwedbankPayTest\Api\Service\Payment\Transaction\Resource\Response;

use TestCase;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\TransactionResponse;

class TransactionResponseTest extends TestCase
{
    public function testData()
    {
        $object = new TransactionResponse();

        $this->assertInstanceOf(
            TransactionResponse::class,
            $object->setPayment('test')
        );
        $this->assertEquals('test', $object->getPayment());
    }
}
