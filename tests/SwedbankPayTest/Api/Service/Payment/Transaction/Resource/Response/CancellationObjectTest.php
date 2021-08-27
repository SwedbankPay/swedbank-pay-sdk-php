<?php

namespace SwedbankPayTest\Api\Service\Payment\Transaction\Resource\Response;

use TestCase;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\CancellationObject;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\CancellationObjectInterface;
use SwedbankPay\Api\Service\Creditcard\Transaction\Resource\Response\Cancellation;

class CancellationObjectTest extends TestCase
{
    public function testData()
    {
        $object = new CancellationObject();
        $cancellation = new Cancellation();

        $this->assertInstanceOf(
            CancellationObjectInterface::class,
            $object->setCancellation($cancellation)
        );
        $this->assertInstanceOf(Cancellation::class, $object->getCancellation());
    }
}
