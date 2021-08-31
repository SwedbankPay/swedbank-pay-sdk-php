<?php

namespace SwedbankPayTest\Api\Service\Payment\Transaction\Resource\Response;

use TestCase;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\CaptureObject;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\CaptureObjectInterface;
use SwedbankPay\Api\Service\Creditcard\Transaction\Resource\Response\Capture;

class CaptureObjectTest extends TestCase
{
    public function testData()
    {
        $object = new CaptureObject();
        $capture = new Capture();

        $this->assertInstanceOf(
            CaptureObjectInterface::class,
            $object->setCapture($capture)
        );
        $this->assertInstanceOf(Capture::class, $object->getCapture());
    }
}
