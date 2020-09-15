<?php

use SwedbankPay\Api\Service\Payment\Resource\Request\Metadata;

class MetadataTest extends TestCase
{
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
    }
}
