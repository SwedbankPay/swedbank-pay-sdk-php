<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Paymentorder\Resource;

use TestCase;
use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderUrl;

class PaymentorderUrlTest extends TestCase
{
    public function testData()
    {
        $object = new PaymentorderUrl();

        $this->assertInstanceOf(
            PaymentorderUrl::class,
            $object->setCompleteUrl('\test')
        );
        $this->assertEquals('\test', $object->getCompleteUrl());

        $this->assertInstanceOf(
            PaymentorderUrl::class,
            $object->setCancelUrl('\test')
        );
        $this->assertEquals('\test', $object->getCancelUrl());

        $this->assertInstanceOf(
            PaymentorderUrl::class,
            $object->setPaymentUrl('\test')
        );
        $this->assertEquals('\test', $object->getPaymentUrl());

        $this->assertInstanceOf(
            PaymentorderUrl::class,
            $object->setCallbackUrl('\test')
        );
        $this->assertEquals('\test', $object->getCallbackUrl());

        $this->assertInstanceOf(
            PaymentorderUrl::class,
            $object->setTermsOfService('\test')
        );
        $this->assertEquals('\test', $object->getTermsOfService());

        $this->assertInstanceOf(
            PaymentorderUrl::class,
            $object->setLogoUrl('\test')
        );
        $this->assertEquals('\test', $object->getLogoUrl());

        $this->assertInstanceOf(
            PaymentorderUrl::class,
            $object->setHostUrls([])
        );
        $this->assertIsArray($object->getHostUrls());
    }
}