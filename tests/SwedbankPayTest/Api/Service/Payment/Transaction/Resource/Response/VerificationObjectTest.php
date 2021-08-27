<?php

namespace SwedbankPayTest\Api\Service\Payment\Transaction\Resource\Response;

use TestCase;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\VerificationObject;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\VerificationObjectInterface;
use SwedbankPay\Api\Service\Creditcard\Transaction\Resource\Response\Verification;

class VerificationObjectTest extends TestCase
{
    public function testData()
    {
        $object = new VerificationObject();
        $verification = new Verification();

        $this->assertInstanceOf(
            VerificationObjectInterface::class,
            $object->setVerification($verification)
        );
        $this->assertInstanceOf(Verification::class, $object->getVerification());
    }
}
