<?php

namespace SwedbankPayTest\Api\Service\Payment\Transaction\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Request\TransactionObject;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Request\Data\TransferInterface;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Request\Transfer;

class TransactionObjectTest extends TestCase
{
    public function testData()
    {
        $object = new TransactionObject();
        $transfer = new Transfer();

        $this->assertInstanceOf(
            TransactionObject::class,
            $object->setTransaction($transfer)
        );
        $this->assertInstanceOf(TransferInterface::class, $object->getTransaction());
    }
}
