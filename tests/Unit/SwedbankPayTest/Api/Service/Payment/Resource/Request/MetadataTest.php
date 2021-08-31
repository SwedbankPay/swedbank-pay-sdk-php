<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Payment\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Payment\Resource\Request\Metadata;

class MetadataTest extends TestCase
{
    public function testData()
    {
        $object = new Metadata();

        $this->assertInstanceOf(
            Metadata::class,
            $object->setData('test', 'test')
        );
        $this->assertEquals('test', $object->getData('test'));

        $this->assertInstanceOf(
            Metadata::class,
            $object->unsetData('test')
        );
        $this->assertEquals(null, $object->getData('test'));
    }

    public function testMetadata()
    {
        $metadata = new Metadata();
        $metadata->setData('order_id', 'or-123456');

        $data = json_decode($metadata->__toJson(), true);
        $this->assertIsArray($data);
        $this->assertArrayHasKey('orderId', $data);

        $data = $metadata->__toArray();
        $this->assertIsArray($data);
        $this->assertArrayHasKey('order_id', $data);

        $data = $metadata->getData('order_id');
        $this->assertEquals('or-123456', $data);

        $metadata->unsetData('order_id');
        $this->assertNull($metadata->getData('order_id'));
    }
}
