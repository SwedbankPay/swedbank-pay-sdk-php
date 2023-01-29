<?php
// phpcs:ignoreFile --

namespace SwedbankPayTest\Api\Service\Paymentorder\Request;

use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderObject;
use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderUrl;
use SwedbankPay\Api\Service\Paymentorder\Resource\Request\Paymentorder;
use TestCase;
use SwedbankPay\Api\Service\Paymentorder\Request\UnscheduledPurchase;

class UnscheduledPurchaseTest extends TestCase
{
    public function testData()
    {
        $object = new UnscheduledPurchase();
        $object->setClient($this->client);
        $this->assertTrue(method_exists($object, 'setup'));
        $this->assertNull($object->setup());

        $this->assertNotNull($object->getRequestMethod());
        $this->assertNotNull($object->getRequestEndpoint());
        $this->assertNotNull($object->getServiceOperation());
    }

    public function testMethods()
    {
        $urlData = new PaymentorderUrl();
        $urlData->setCallbackUrl('https://api.internaltest.payex.com/psp/fakecallback');

        $paymentOrder = new Paymentorder();
        $paymentOrder->setUrls($urlData);

        $paymentOrderObject = new PaymentorderObject();
        $paymentOrderObject->setPaymentorder($paymentOrder);

        $object = new UnscheduledPurchase($paymentOrderObject);
        $object->setClient($this->client);

        $this->assertIsArray($object->getUrls());
    }
}
