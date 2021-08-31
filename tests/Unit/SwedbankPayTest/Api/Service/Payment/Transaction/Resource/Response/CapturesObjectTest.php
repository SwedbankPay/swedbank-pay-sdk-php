<?php

namespace SwedbankPayTest\Api\Service\Payment\Transaction\Resource\Response;

use TestCase;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\CapturesObject;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\CapturesInterface;
//use SwedbankPay\Api\Service\Creditcard\Transaction\Resource\Response\Captures;

class CapturesObjectTest extends TestCase
{
    public function testData()
    {
        $this->markTestSkipped('Object instance of CapturesInterface hasn\'t implemented yet');

        // @todo Object instance of CapturesInterface hasn't implemented yet
        $object = new CapturesObject();
        $captures = new Captures();

        $this->assertInstanceOf(
            CapturesObject::class,
            $object->setCaptures($captures)
        );
        $this->assertInstanceOf(Captures::class, $object->getCaptures());
    }
}
