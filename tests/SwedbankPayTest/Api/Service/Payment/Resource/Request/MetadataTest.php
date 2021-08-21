<?php

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
}
