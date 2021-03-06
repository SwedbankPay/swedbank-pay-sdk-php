<?php

use SwedbankPay\Api\Service\Payment\Resource\Request\Payment;

class PaymentRequestTest extends TestCase
{
    public function testInitiatingSystemUserAgent()
    {
        $payment = new Payment();

        $this->assertTrue(method_exists($payment, 'getInitiatingSystemUserAgent'));
        $this->assertTrue(method_exists($payment, 'setInitiatingSystemUserAgent'));

        $result = $payment->setInitiatingSystemUserAgent('swedbankpay-sdk-php/123');
        $this->assertInstanceOf(
            '\SwedbankPay\Api\Service\Payment\Resource\Request\Data\PaymentRequestInterface',
            $result
        );

        $result = $payment->getInitiatingSystemUserAgent();
        $this->assertEquals('swedbankpay-sdk-php/123', $result);
    }
}
