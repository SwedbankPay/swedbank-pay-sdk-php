<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Creditcard\Transaction\Resource\Request;

use SwedbankPay\Api\Service\Creditcard\Transaction\Resource\Request\TransactionAuthorization;
use TestCase;

class TransactionAuthorizationTest extends TestCase
{
    public function testData()
    {
        $object = new TransactionAuthorization();

        $this->assertInstanceOf(TransactionAuthorization::class, $object->setCardNumber('test'));
        $this->assertEquals('test', $object->getCardNumber());

        $this->assertInstanceOf(
            TransactionAuthorization::class,
            $object->setCardExpiryMonth(11)
        );
        $this->assertEquals(11, $object->getCardExpiryMonth());

        $this->assertInstanceOf(
            TransactionAuthorization::class,
            $object->setCardExpiryYear(11)
        );
        $this->assertEquals(11, $object->getCardExpiryYear());

        $this->assertInstanceOf(
            TransactionAuthorization::class,
            $object->setCardVerificationCode('test')
        );
        $this->assertEquals(
            'test',
            $object->getCardVerificationCode()
        );

        $this->assertInstanceOf(
            TransactionAuthorization::class,
            $object->setCardholderName('test')
        );
        $this->assertEquals('test', $object->getCardholderName());
    }
}
