<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Paymentorder\V3\Resource;

use TestCase;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Details;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Paid;

class PaidTest extends TestCase
{
    public function testData()
    {
        $object = new Paid();

        $this->assertInstanceOf(Paid::class, $object->setId('/psp/paymentorders/abc/paid'));
        $this->assertEquals('/psp/paymentorders/abc/paid', $object->getId());

        $this->assertNull($object->getNumber());
        $this->assertNull($object->getInstrument());
        $this->assertNull($object->getPayeeReference());
        $this->assertNull($object->getTransactionType());
        $this->assertNull($object->getAmount());
        $this->assertNull($object->getSubmittedAmount());
        $this->assertNull($object->getFeeAmount());
        $this->assertNull($object->getDiscountAmount());

        $this->assertNull($object->getPaymentToken());
        $this->assertNull($object->getRecurrenceToken());
        $this->assertNull($object->getUnscheduledToken());
        $this->assertNull($object->getNonPaymentToken());
        $this->assertNull($object->getExternalNonPaymentToken());
        $this->assertNull($object->getTransactionsOnFileToken());

        $this->assertNull($object->getDetails());
    }

    public function testTokenFallbackThroughDetails()
    {
        $details = new Details(['non_payment_token' => 'fallback-token-1']);

        $object = new Paid();
        $object->offsetSet(Paid::DETAILS, $details);

        // Top-level token is null, falls back to details.
        $this->assertEquals('fallback-token-1', $object->getNonPaymentToken());

        // When set explicitly at top-level, it takes precedence.
        $object->offsetSet(Paid::NON_PAYMENT_TOKEN, 'top-level-token');
        $this->assertEquals('top-level-token', $object->getNonPaymentToken());
    }
}
