<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Invoice\Transaction\Resource\Request;

use SwedbankPay\Api\Service\Invoice\Transaction\Resource\Request\Reversal;
use TestCase;

class ReversalTest extends TestCase
{
    public function testData()
    {
        $object = new Reversal();

        $this->assertInstanceOf(
            Reversal::class,
            $object->setActivity('test')
        );
        $this->assertEquals('test', $object->getActivity());

        $this->assertInstanceOf(
            Reversal::class,
            $object->setReceiptReference('test')
        );
        $this->assertEquals('test', $object->getReceiptReference());
    }
}
