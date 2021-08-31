<?php

namespace SwedbankPayTest\Api\Service\Payment\Transaction\Resource\Response;

use TestCase;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\CancellationsObject;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\CancellationsInterface;
//use SwedbankPay\Api\Service\Creditcard\Transaction\Resource\Response\Cancellations;

class CancellationsObjectTest extends TestCase
{
    public function testData()
    {
        $this->markTestSkipped('Object instance of CancellationsInterface hasn\'t implemented yet');

        // @todo Object instance of CancellationsInterface hasn't implemented yet
        $object = new CancellationsObject();
        $cancellations = new Cancellations();

        $this->assertInstanceOf(
            CancellationsObject::class,
            $object->setCancellations($cancellations)
        );
        $this->assertInstanceOf(Cancellations::class, $object->getCancellations());
    }
}
