<?php

use SwedbankPay\Api\Service\Paymentorder\Resource\Request\Paymentorder;

class PaymentorderTest extends TestCase
{
    public function testInitiatingSystemUserAgent()
    {
        $paymentOrder = new Paymentorder();

        $this->assertTrue(method_exists($paymentOrder, 'getInitiatingSystemUserAgent'));
        $this->assertTrue(method_exists($paymentOrder, 'setInitiatingSystemUserAgent'));

        $result = $paymentOrder->setInitiatingSystemUserAgent('swedbankpay-sdk-php/123');
        $this->assertInstanceOf('Paymentorder', $result);

        $result = $paymentOrder->getInitiatingSystemUserAgent();
        $this->assertEquals('swedbankpay-sdk-php/123', $result);
    }

    public function testCurrency()
    {
        $paymentOrder = new Paymentorder();

        $this->assertTrue(method_exists($paymentOrder, 'getCurrency'));
        $this->assertTrue(method_exists($paymentOrder, 'setCurrency'));

        $result = $paymentOrder->setCurrency('SEK');
        $this->assertInstanceOf('Paymentorder', $result);

        $result = $paymentOrder->getCurrency();
        $this->assertEquals('SEK', $result);
    }

    public function testAmount()
    {
        $paymentOrder = new Paymentorder();

        $this->assertTrue(method_exists($paymentOrder, 'getAmount'));
        $this->assertTrue(method_exists($paymentOrder, 'setAmount'));

        $result = $paymentOrder->setAmount(1);
        $this->assertInstanceOf('Paymentorder', $result);

        $result = $paymentOrder->getAmount();
        $this->assertEquals(1, $result);
    }

    public function testVatAmount()
    {
        $paymentOrder = new Paymentorder();

        $this->assertTrue(method_exists($paymentOrder, 'getVatAmount'));
        $this->assertTrue(method_exists($paymentOrder, 'setVatAmount'));

        $result = $paymentOrder->setVatAmount(1);
        $this->assertInstanceOf('Paymentorder', $result);

        $result = $paymentOrder->getVatAmount();
        $this->assertEquals(1, $result);
    }

    public function testDescription()
    {
        $paymentOrder = new Paymentorder();

        $this->assertTrue(method_exists($paymentOrder, 'getDescription'));
        $this->assertTrue(method_exists($paymentOrder, 'setDescription'));

        $result = $paymentOrder->setDescription('Description');
        $this->assertInstanceOf('Paymentorder', $result);

        $result = $paymentOrder->getDescription();
        $this->assertEquals('Description', $result);
    }

    public function testUserAgent()
    {
        $paymentOrder = new Paymentorder();

        $this->assertTrue(method_exists($paymentOrder, 'getUserAgent'));
        $this->assertTrue(method_exists($paymentOrder, 'setUserAgent'));

        $result = $paymentOrder->setUserAgent('UserAgent');
        $this->assertInstanceOf('Paymentorder', $result);

        $result = $paymentOrder->getUserAgent();
        $this->assertEquals('UserAgent', $result);
    }

    public function testLanguage()
    {
        $paymentOrder = new Paymentorder();

        $this->assertTrue(method_exists($paymentOrder, 'getLanguage'));
        $this->assertTrue(method_exists($paymentOrder, 'setLanguage'));

        $result = $paymentOrder->setLanguage('en-US');
        $this->assertInstanceOf('Paymentorder', $result);

        $result = $paymentOrder->getLanguage();
        $this->assertEquals('en-US', $result);
    }

    public function testGeneratePaymentToken()
    {
        $paymentOrder = new Paymentorder();

        $this->assertTrue(method_exists($paymentOrder, 'isGeneratePaymentToken'));
        $this->assertTrue(method_exists($paymentOrder, 'setGeneratePaymentToken'));

        $result = $paymentOrder->setGeneratePaymentToken(true);
        $this->assertInstanceOf('Paymentorder', $result);

        $result = $paymentOrder->isGeneratePaymentToken();
        $this->assertEquals(true, $result);
    }

    public function testDisablePaymentMenu()
    {
        $paymentOrder = new Paymentorder();

        $this->assertTrue(method_exists($paymentOrder, 'isDisablePaymentMenu'));
        $this->assertTrue(method_exists($paymentOrder, 'setDisablePaymentMenu'));

        $result = $paymentOrder->setDisablePaymentMenu(true);
        $this->assertInstanceOf('Paymentorder', $result);

        $result = $paymentOrder->isDisablePaymentMenu();
        $this->assertEquals(true, $result);
    }

    public function testPayerReference()
    {
        $paymentOrder = new Paymentorder();

        $this->assertTrue(method_exists($paymentOrder, 'getPayerReference'));
        $this->assertTrue(method_exists($paymentOrder, 'setPayerReference'));

        $result = $paymentOrder->setPayerReference('123');
        $this->assertInstanceOf('Paymentorder', $result);

        $result = $paymentOrder->getPayerReference();
        $this->assertEquals('123', $result);
    }

}