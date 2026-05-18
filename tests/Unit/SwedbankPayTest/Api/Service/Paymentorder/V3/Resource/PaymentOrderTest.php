<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Paymentorder\V3\Resource;

use TestCase;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\PaymentOrder;

class PaymentOrderTest extends TestCase
{
    public function testData()
    {
        $object = new PaymentOrder();

        $this->assertInstanceOf(PaymentOrder::class, $object->setId('/psp/paymentorders/abc'));
        $this->assertEquals('/psp/paymentorders/abc', $object->getId());

        // Scalars: status replaces v2's `state`, plus the rest of the v3.1 surface.
        $this->assertNull($object->getCreated());
        $this->assertNull($object->getUpdated());
        $this->assertNull($object->getOperation());
        $this->assertNull($object->getStatus());
        $this->assertNull($object->getCurrency());
        $this->assertNull($object->getAmount());
        $this->assertNull($object->getVatAmount());
        $this->assertNull($object->getRemainingReversalAmount());
        $this->assertNull($object->getRemainingCaptureAmount());
        $this->assertNull($object->getRemainingCancellationAmount());
        $this->assertNull($object->getDescription());
        $this->assertNull($object->getInitiatingSystemUserAgent());
        $this->assertNull($object->getLanguage());
        $this->assertNull($object->getAvailableInstruments());
        $this->assertNull($object->getImplementation());
        $this->assertNull($object->getIntegration());
        $this->assertNull($object->getInstrumentMode());
        $this->assertNull($object->getGuestMode());
        $this->assertNull($object->getNumber());
        $this->assertNull($object->getInstrument());

        // Sub-resource accessors return null until the factory hydrates them.
        $this->assertNull($object->getOrderItems());
        $this->assertNull($object->getUrls());
        $this->assertNull($object->getPayeeInfo());
        $this->assertNull($object->getPayer());
        $this->assertNull($object->getHistory());
        $this->assertNull($object->getFailed());
        $this->assertNull($object->getAborted());
        $this->assertNull($object->getPaid());
        $this->assertNull($object->getCancelled());
        $this->assertNull($object->getReversed());
        $this->assertNull($object->getFinancialTransactions());
        $this->assertNull($object->getFailedAttempts());
        $this->assertNull($object->getPostPurchaseFailedAttempts());
        $this->assertNull($object->getMetadata());
    }
}
