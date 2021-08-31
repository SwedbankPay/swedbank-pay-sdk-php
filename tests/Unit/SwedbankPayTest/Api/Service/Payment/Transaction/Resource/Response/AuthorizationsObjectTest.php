<?php

namespace SwedbankPayTest\Api\Service\Payment\Transaction\Resource\Response;

use TestCase;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\AuthorizationsObject;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\AuthorizationsInterface;
//use SwedbankPay\Api\Service\Creditcard\Transaction\Resource\Response\Authorizations;

class AuthorizationsObjectTest extends TestCase
{
    public function testData()
    {
        $this->markTestSkipped('Object instance of AuthorizationsInterface hasn\'t implemented yet');

        // @todo Object instance of AuthorizationsInterface hasn't implemented yet
        $object = new AuthorizationsObject();
        $authorizations = new Authorization();

        $this->assertInstanceOf(
            AuthorizationsObject::class,
            $object->setAuthorizations($authorizations)
        );
        $this->assertInstanceOf(Authorizations::class, $object->getAuthorizations());
    }
}
