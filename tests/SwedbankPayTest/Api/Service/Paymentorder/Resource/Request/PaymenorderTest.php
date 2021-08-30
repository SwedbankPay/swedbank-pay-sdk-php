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
use TestCase;
use SwedbankPay\Api\Service\Paymentorder\Resource\Request\Paymentorder;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
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
            $object->setInitiatingSystemUserAgent('test')
        );
        $this->assertEquals('test', $object->getInitiatingSystemUserAgent());

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
            $object->setRecurrenceToken('test')
        );
        $this->assertEquals('test', $object->getRecurrenceToken());

        $this->assertInstanceOf(
            Paymentorder::class,
            $object->setRiskIndicator(new PaymentorderRiskIndicator())
        );
        $this->assertInstanceOf(PaymentorderRiskIndicatorInterface::class, $object->getRiskIndicator());

    }
}