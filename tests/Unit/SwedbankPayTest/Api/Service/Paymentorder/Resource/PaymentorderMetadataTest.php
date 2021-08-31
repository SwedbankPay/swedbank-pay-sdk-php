<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Paymentorder\Resource;

use TestCase;
use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderMetadata;

class PaymentorderMetadataTest extends TestCase
{
    public function testData()
    {
        $object = new PaymentorderMetadata();

        $this->assertInstanceOf(
            PaymentorderMetadata::class,
            $object->setData('test', 'test')
        );
        $this->assertEquals('test', $object->getData('test'));

        $this->assertInstanceOf(
            PaymentorderMetadata::class,
            $object->unsetData('test')
        );
        $this->assertEquals(null, $object->getData('test'));
    }
}
