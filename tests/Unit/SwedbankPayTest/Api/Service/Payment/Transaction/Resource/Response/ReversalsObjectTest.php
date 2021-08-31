<?php

namespace SwedbankPayTest\Api\Service\Payment\Transaction\Resource\Response;

use TestCase;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\ReversalsObject;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\ReversalsInterface;
//use SwedbankPay\Api\Service\Creditcard\Transaction\Resource\Response\Reversals;

class ReversalsObjectTest extends TestCase
{
    public function testData()
    {
        $this->markTestSkipped('Object instance of ReversalsInterface hasn\'t implemented yet');

        // @todo Object instance of ReversalsInterface hasn't implemented yet
        $object = new ReversalsObject();
        $reversals = new Reversals();

        $this->assertInstanceOf(
            ReversalsObject::class,
            $object->setReversals($reversals)
        );
        $this->assertInstanceOf(Reversals::class, $object->getReversals());
    }
}
