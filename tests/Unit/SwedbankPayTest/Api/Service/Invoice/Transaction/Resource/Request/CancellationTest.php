<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Invoice\Transaction\Resource\Request;

use SwedbankPay\Api\Service\Invoice\Transaction\Resource\Request\Cancellation;
use TestCase;

class CancellationTest extends TestCase
{
    public function testData()
    {
        $object = new Cancellation();

        $this->assertInstanceOf(
            Cancellation::class,
            $object->setActivity('test')
        );
        $this->assertEquals('test', $object->getActivity());
    }
}
