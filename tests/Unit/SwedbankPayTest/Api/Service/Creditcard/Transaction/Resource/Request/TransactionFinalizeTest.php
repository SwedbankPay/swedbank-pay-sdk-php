<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Creditcard\Transaction\Resource\Request;

use SwedbankPay\Api\Service\Creditcard\Transaction\Resource\Request\TransactionFinalize;
use TestCase;

class TransactionFinalizeTest extends TestCase
{
    public function testData()
    {
        $object = new TransactionFinalize();

        $this->assertInstanceOf(TransactionFinalize::class, $object->setActivity('test'));
        $this->assertEquals('test', $object->getActivity());
    }
}
