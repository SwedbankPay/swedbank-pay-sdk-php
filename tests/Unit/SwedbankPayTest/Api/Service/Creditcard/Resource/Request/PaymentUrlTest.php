<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Creditcard\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentUrl;

class PaymentUrlTest extends TestCase
{
    public function testData()
    {
        $object = new PaymentUrl();
        $this->assertInstanceOf(
            PaymentUrl::class,
            $object->setCompleteUrl('\test')
        );
        $this->assertEquals('\test', $object->getCompleteUrl());

        $this->assertInstanceOf(
            PaymentUrl::class,
            $object->setCancelUrl('\test')
        );
        $this->assertEquals('\test', $object->getCancelUrl());

        $this->assertInstanceOf(
            PaymentUrl::class,
            $object->setPaymentUrl('\test')
        );
        $this->assertEquals('\test', $object->getPaymentUrl());

        $this->assertInstanceOf(
            PaymentUrl::class,
            $object->setCallbackUrl('\test')
        );
        $this->assertEquals('\test', $object->getCallbackUrl());

        $this->assertInstanceOf(
            PaymentUrl::class,
            $object->setTermsOfService('\test')
        );
        $this->assertEquals('\test', $object->getTermsOfService());

        $this->assertInstanceOf(
            PaymentUrl::class,
            $object->setLogoUrl('\test')
        );
        $this->assertEquals('\test', $object->getLogoUrl());

        $this->assertInstanceOf(
            PaymentUrl::class,
            $object->setHostUrls([])
        );
        $this->assertIsArray($object->getHostUrls());
    }
}