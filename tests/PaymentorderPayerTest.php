<?php

use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderPayer;

class PaymentorderPayerTest extends TestCase
{
    public function testMethods()
    {
        $payer = new PaymentorderPayer();

        $this->assertTrue(method_exists($payer, 'getConsumerProfileRef'));
        $this->assertTrue(method_exists($payer, 'setConsumerProfileRef'));
        $this->assertTrue(method_exists($payer, 'getPayerReference'));
        $this->assertTrue(method_exists($payer, 'setPayerReference'));
        $this->assertTrue(method_exists($payer, 'getEmail'));
        $this->assertTrue(method_exists($payer, 'setEmail'));
        $this->assertTrue(method_exists($payer, 'getMsisdn'));
        $this->assertTrue(method_exists($payer, 'setMsisdn'));
        $this->assertTrue(method_exists($payer, 'getWorkPhoneNumber'));
        $this->assertTrue(method_exists($payer, 'setWorkPhoneNumber'));
        $this->assertTrue(method_exists($payer, 'getHomePhoneNumber'));
        $this->assertTrue(method_exists($payer, 'setHomePhoneNumber'));
        $this->assertTrue(method_exists($payer, 'getShippingAddress'));
        $this->assertTrue(method_exists($payer, 'setShippingAddress'));

        $payer->setEmail('test@email.no')
            ->setMsisdn('1234567');

        $this->assertEquals('test@email.no', $payer->getEmail());
        $this->assertEquals('1234567', $payer->getMsisdn());
    }
}
