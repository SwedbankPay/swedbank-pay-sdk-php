<?php

namespace SwedbankPayTest\Api\Service\Payment\Transaction\Resource\Response;

use TestCase;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\AuthorizationObject;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\AuthorizationObjectInterface;
use SwedbankPay\Api\Service\Creditcard\Transaction\Resource\Response\Authorization;

class AuthorizationObjectTest extends TestCase
{
    public function testData()
    {
        $object = new AuthorizationObject();
        $authorization = new Authorization();

        $this->assertInstanceOf(
            AuthorizationObjectInterface::class,
            $object->setAuthorization($authorization)
        );
        $this->assertInstanceOf(Authorization::class, $object->getAuthorization());
    }
}
