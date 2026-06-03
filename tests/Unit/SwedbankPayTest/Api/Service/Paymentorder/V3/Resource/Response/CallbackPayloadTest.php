<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Paymentorder\V3\Resource\Response;

use TestCase;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\PaymentOrder;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Response\CallbackPayload;

class CallbackPayloadTest extends TestCase
{
    /**
     * @return string
     */
    private function getSampleResponse()
    {
        return file_get_contents(__DIR__ . '/sampleCallbackV3.json');
    }

    public function testParsesJsonString()
    {
        $payload = new CallbackPayload($this->getSampleResponse());

        $this->assertEquals('PO-638423890947905216', $payload->getOrderReference());
        $this->assertInstanceOf(PaymentOrder::class, $payload->getPaymentOrder());
        $this->assertEquals(
            '/psp/paymentorders/a9bd5ea2-d2b0-48d1-59c8-08dc230b04ba',
            $payload->getPaymentOrder()->getId()
        );
        $this->assertEquals(40129161258, $payload->getPaymentOrder()->getNumber());
        $this->assertEquals('CreditCard', $payload->getPaymentOrder()->getInstrument());
    }

    public function testParsesPreDecodedArray()
    {
        $payload = new CallbackPayload(json_decode($this->getSampleResponse(), true));

        $this->assertEquals('PO-638423890947905216', $payload->getOrderReference());
        $this->assertEquals(40129161258, $payload->getPaymentOrder()->getNumber());
    }
}
