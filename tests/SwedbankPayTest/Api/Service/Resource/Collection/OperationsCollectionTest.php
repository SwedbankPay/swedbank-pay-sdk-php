<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Resource\Collection;

use TestCase;
use SwedbankPay\Api\Service\Resource\Collection\OperationsCollection;

class OperationsCollectionTest extends TestCase
{
    public function testData()
    {
        $object = new OperationsCollection();
        $this->assertInstanceOf(OperationsCollection::class, $object);
    }
}
