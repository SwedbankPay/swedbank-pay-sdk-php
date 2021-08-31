<?php

namespace SwedbankPayTest\Api\Service\Payment\Transaction\Resource\Response;

use TestCase;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\ReversalObject;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\ReversalObjectInterface;
use SwedbankPay\Api\Service\Creditcard\Transaction\Resource\Response\Reversal;

class ReversalObjectTest extends TestCase
{
    public function testData()
    {
        $object = new ReversalObject();
        $reversal = new Reversal();

        $this->assertInstanceOf(
            ReversalObjectInterface::class,
            $object->setReversal($reversal)
        );
        $this->assertInstanceOf(Reversal::class, $object->getReversal());
    }
}
