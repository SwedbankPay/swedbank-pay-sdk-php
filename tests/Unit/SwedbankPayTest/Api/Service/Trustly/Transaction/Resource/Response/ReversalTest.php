<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Trustly\Transaction\Resource\Response;

use SwedbankPay\Api\Service\Trustly\Transaction\Resource\Response\Reversal;
use TestCase;

class ReversalTest extends TestCase
{
    public function testData()
    {
        $object = new Reversal();

        $this->assertInstanceOf(
            Reversal::class,
            $object->setId('test')
        );
        $this->assertEquals('test', $object->getId());
    }
}
