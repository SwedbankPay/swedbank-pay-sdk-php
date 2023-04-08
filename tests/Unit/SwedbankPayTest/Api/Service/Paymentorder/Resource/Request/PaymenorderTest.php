<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Paymentorder\Resource\Request;

use SwedbankPay\Api\Service\Paymentorder\Resource\Collection\OrderItemsCollection;
use SwedbankPay\Api\Service\Paymentorder\Resource\Collection\PaymentorderItemsCollection;
use SwedbankPay\Api\Service\Paymentorder\Resource\Data\PaymentorderMetadataInterface;
use SwedbankPay\Api\Service\Paymentorder\Resource\Data\PaymentorderPayeeInfoInterface;
use SwedbankPay\Api\Service\Paymentorder\Resource\Data\PaymentorderPayerInterface;
use SwedbankPay\Api\Service\Paymentorder\Resource\Data\PaymentorderRiskIndicatorInterface;
use SwedbankPay\Api\Service\Paymentorder\Resource\Data\PaymentorderUrlInterface;
use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderMetadata;
use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderPayeeInfo;
use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderPayer;
use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderRiskIndicator;
use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderUrl;
use SwedbankPay\Api\Service\Paymentorder\Resource\Request\Data\PaymentorderInterface;
use TestCase;
use SwedbankPay\Api\Service\Paymentorder\Resource\Request\Paymentorder;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.TooManyMethods)
 */
class PaymenorderTest extends TestCase
{
    /**
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function testData()
    {
        $object = new Paymentorder();

        $this->assertInstanceOf(
            Paymentorder::class,
            $object->setCurrency('test')
        );
        $this->assertEquals('test', $object->getCurrency());

        $this->assertInstanceOf(
            Paymentorder::class,
            $object->setAmount(123)
        );
        $this->assertEquals(123, $object->getAmount());

        $this->assertInstanceOf(
            Paymentorder::class,
            $object->setVatAmount(123)
        );
        $this->assertEquals(123, $object->getVatAmount());

        $this->assertInstanceOf(
            Paymentorder::class,
            $object->setDescription('test')
        );
        $this->assertEquals('test', $object->getDescription());

        $this->assertInstanceOf(
            Paymentorder::class,
            $object->setUserAgent('test')
        );
        $this->assertEquals('test', $object->getUserAgent());

        $this->assertInstanceOf(
            Paymentorder::class,
            $object->setLanguage('test')
        );
        $this->assertEquals('test', $object->getLanguage());

        $this->assertInstanceOf(
            Paymentorder::class,
            $object->setGeneratePaymentToken(true)
        );
        $this->assertEquals(true, $object->isGeneratePaymentToken());

        $this->assertInstanceOf(
            Paymentorder::class,
            $object->setGenerateRecurrenceToken(true)
        );
        $this->assertEquals(true, $object->isGenerateRecurrenceToken());

        $this->assertInstanceOf(
            Paymentorder::class,
            $object->setGenerateUnscheduledToken(true)
        );
        $this->assertEquals(true, $object->isGenerateUnscheduledToken());

        $this->assertInstanceOf(
            Paymentorder::class,
            $object->setDisablePaymentMenu(true)
        );
        $this->assertEquals(true, $object->isDisablePaymentMenu());

        $this->assertInstanceOf(
            Paymentorder::class,
            $object->setUrls(new PaymentorderUrl())
        );
        $this->assertInstanceOf(PaymentorderUrlInterface::class, $object->getUrls());

        $this->assertInstanceOf(
            Paymentorder::class,
            $object->setPayeeInfo(new PaymentorderPayeeInfo())
        );
        $this->assertInstanceOf(PaymentorderPayeeInfoInterface::class, $object->getPayeeInfo());

        $this->assertInstanceOf(
            Paymentorder::class,
            $object->setPayer(new PaymentorderPayer())
        );
        $this->assertInstanceOf(PaymentorderPayerInterface::class, $object->getPayer());

        $this->assertInstanceOf(
            Paymentorder::class,
            $object->setPayerReference('test')
        );
        $this->assertEquals('test', $object->getPayerReference());

        $this->assertInstanceOf(
            Paymentorder::class,
            $object->setOrderItems(new OrderItemsCollection())
        );
        $this->assertInstanceOf(OrderItemsCollection::class, $object->getOrderItems());

        $this->assertInstanceOf(
            Paymentorder::class,
            $object->setMetadata(new PaymentorderMetadata())
        );
        $this->assertInstanceOf(PaymentorderMetadataInterface::class, $object->getMetadata());

        $this->assertInstanceOf(
            Paymentorder::class,
            $object->setItems(new PaymentorderItemsCollection())
        );
        $this->assertInstanceOf(PaymentorderItemsCollection::class, $object->getItems());

        $this->assertInstanceOf(
            Paymentorder::class,
            $object->setIntent('test')
        );
        $this->assertEquals('test', $object->getIntent());

        $this->assertInstanceOf(
            Paymentorder::class,
            $object->setPaymentToken('test')
        );
        $this->assertEquals('test', $object->getPaymentToken());

        $this->assertInstanceOf(
            Paymentorder::class,
            $object->setUnscheduledToken('test')
        );
        $this->assertEquals('test', $object->getUnscheduledToken());

        $this->assertInstanceOf(
            Paymentorder::class,
            $object->setRecurrenceToken('test')
        );
        $this->assertEquals('test', $object->getRecurrenceToken());

        $this->assertInstanceOf(
            Paymentorder::class,
            $object->setRiskIndicator(new PaymentorderRiskIndicator())
        );
        $this->assertInstanceOf(PaymentorderRiskIndicatorInterface::class, $object->getRiskIndicator());

        $this->assertInstanceOf(
            Paymentorder::class,
            $object->setProductName('Checkout3')
        );
        $this->assertEquals('Checkout3', $object->getProductName());
    }

    public function testInitiatingSystemUserAgent()
    {
        $paymentOrder = new Paymentorder();

        $this->assertTrue(method_exists($paymentOrder, 'getInitiatingSystemUserAgent'));
        $this->assertTrue(method_exists($paymentOrder, 'setInitiatingSystemUserAgent'));

        $result = $paymentOrder->setInitiatingSystemUserAgent('swedbankpay-sdk-php/123');
        $this->assertInstanceOf(PaymentorderInterface::class, $result);

        $result = $paymentOrder->getInitiatingSystemUserAgent();
        $this->assertEquals('swedbankpay-sdk-php/123', $result);
    }

    public function testCurrency()
    {
        $paymentOrder = new Paymentorder();

        $this->assertTrue(method_exists($paymentOrder, 'getCurrency'));
        $this->assertTrue(method_exists($paymentOrder, 'setCurrency'));

        $result = $paymentOrder->setCurrency('SEK');
        $this->assertInstanceOf(PaymentorderInterface::class, $result);

        $result = $paymentOrder->getCurrency();
        $this->assertEquals('SEK', $result);
    }

    public function testAmount()
    {
        $paymentOrder = new Paymentorder();

        $this->assertTrue(method_exists($paymentOrder, 'getAmount'));
        $this->assertTrue(method_exists($paymentOrder, 'setAmount'));

        $result = $paymentOrder->setAmount(1);
        $this->assertInstanceOf(PaymentorderInterface::class, $result);

        $result = $paymentOrder->getAmount();
        $this->assertEquals(1, $result);
    }

    public function testVatAmount()
    {
        $paymentOrder = new Paymentorder();

        $this->assertTrue(method_exists($paymentOrder, 'getVatAmount'));
        $this->assertTrue(method_exists($paymentOrder, 'setVatAmount'));

        $result = $paymentOrder->setVatAmount(1);
        $this->assertInstanceOf(PaymentorderInterface::class, $result);

        $result = $paymentOrder->getVatAmount();
        $this->assertEquals(1, $result);
    }

    public function testDescription()
    {
        $paymentOrder = new Paymentorder();

        $this->assertTrue(method_exists($paymentOrder, 'getDescription'));
        $this->assertTrue(method_exists($paymentOrder, 'setDescription'));

        $result = $paymentOrder->setDescription('Description');
        $this->assertInstanceOf(PaymentorderInterface::class, $result);

        $result = $paymentOrder->getDescription();
        $this->assertEquals('Description', $result);
    }

    public function testUserAgent()
    {
        $paymentOrder = new Paymentorder();

        $this->assertTrue(method_exists($paymentOrder, 'getUserAgent'));
        $this->assertTrue(method_exists($paymentOrder, 'setUserAgent'));

        $result = $paymentOrder->setUserAgent('UserAgent');
        $this->assertInstanceOf(PaymentorderInterface::class, $result);

        $result = $paymentOrder->getUserAgent();
        $this->assertEquals('UserAgent', $result);
    }

    public function testLanguage()
    {
        $paymentOrder = new Paymentorder();

        $this->assertTrue(method_exists($paymentOrder, 'getLanguage'));
        $this->assertTrue(method_exists($paymentOrder, 'setLanguage'));

        $result = $paymentOrder->setLanguage('en-US');
        $this->assertInstanceOf(PaymentorderInterface::class, $result);

        $result = $paymentOrder->getLanguage();
        $this->assertEquals('en-US', $result);
    }

    public function testGeneratePaymentToken()
    {
        $paymentOrder = new Paymentorder();

        $this->assertTrue(method_exists($paymentOrder, 'isGeneratePaymentToken'));
        $this->assertTrue(method_exists($paymentOrder, 'setGeneratePaymentToken'));

        $result = $paymentOrder->setGeneratePaymentToken(true);
        $this->assertInstanceOf(PaymentorderInterface::class, $result);

        $result = $paymentOrder->isGeneratePaymentToken();
        $this->assertEquals(true, $result);
    }

    public function testDisablePaymentMenu()
    {
        $paymentOrder = new Paymentorder();

        $this->assertTrue(method_exists($paymentOrder, 'isDisablePaymentMenu'));
        $this->assertTrue(method_exists($paymentOrder, 'setDisablePaymentMenu'));

        $result = $paymentOrder->setDisablePaymentMenu(true);
        $this->assertInstanceOf(PaymentorderInterface::class, $result);

        $result = $paymentOrder->isDisablePaymentMenu();
        $this->assertEquals(true, $result);
    }

    public function testPayerReference()
    {
        $paymentOrder = new Paymentorder();

        $this->assertTrue(method_exists($paymentOrder, 'getPayerReference'));
        $this->assertTrue(method_exists($paymentOrder, 'setPayerReference'));

        $result = $paymentOrder->setPayerReference('123');
        $this->assertInstanceOf(PaymentorderInterface::class, $result);

        $result = $paymentOrder->getPayerReference();
        $this->assertEquals('123', $result);
    }
}