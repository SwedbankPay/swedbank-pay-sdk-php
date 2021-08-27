<?php

namespace SwedbankPayTest\Api\Service\Paymentorder\Transaction\Resource\Response;

use TestCase;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response\TransactionCapture;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response\Data\CaptureInterface;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response\Capture;

class TransactionCaptureTest extends TestCase
{
    public function testData()
    {
        $object = new TransactionCapture();

        $this->assertInstanceOf(
            TransactionCapture::class,
            $object->setPayment('test')
        );
        $this->assertEquals('test', $object->getPayment());

        $capture = new Capture();
        $this->assertInstanceOf(
            TransactionCapture::class,
            $object->setCapture($capture)
        );
        $this->assertInstanceOf(CaptureInterface::class, $object->getCapture());
    }
}