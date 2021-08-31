<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Payment\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Payment\Resource\Request\Url;

class UrlTest extends TestCase
{
    public function testData()
    {
        $object = new Url();

        $this->assertInstanceOf(
            Url::class,
            $object->setCompleteUrl('\test')
        );
        $this->assertEquals('\test', $object->getCompleteUrl());

        $this->assertInstanceOf(
            Url::class,
            $object->setCancelUrl('\test')
        );
        $this->assertEquals('\test', $object->getCancelUrl());

        $this->assertInstanceOf(
            Url::class,
            $object->setPaymentUrl('\test')
        );
        $this->assertEquals('\test', $object->getPaymentUrl());

        $this->assertInstanceOf(
            Url::class,
            $object->setCallbackUrl('\test')
        );
        $this->assertEquals('\test', $object->getCallbackUrl());

        $this->assertInstanceOf(
            Url::class,
            $object->setTermsOfService('\test')
        );
        $this->assertEquals('\test', $object->getTermsOfService());

        $this->assertInstanceOf(
            Url::class,
            $object->setLogoUrl('\test')
        );
        $this->assertEquals('\test', $object->getLogoUrl());

        $this->assertInstanceOf(
            Url::class,
            $object->setHostUrls([])
        );
        $this->assertIsArray($object->getHostUrls());
    }
}