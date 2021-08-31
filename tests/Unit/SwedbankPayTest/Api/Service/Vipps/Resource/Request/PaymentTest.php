<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Vipps\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Vipps\Resource\Request\Payment;
use SwedbankPay\Api\Service\Payment\Resource\Collection\PricesCollection;
use SwedbankPay\Api\Service\Payment\Resource\Collection\Item\PriceItem;
use SwedbankPay\Api\Service\Payment\Resource\Request\Metadata;
use SwedbankPay\Api\Service\Vipps\Resource\Request\PaymentPayeeInfo;
use SwedbankPay\Api\Service\Vipps\Resource\Request\PaymentPrefillInfo;
use SwedbankPay\Api\Service\Vipps\Resource\Request\PaymentUrl;

class PaymentTest extends TestCase
{
    public function testData()
    {
        $url = new PaymentUrl();
        $url->setCompleteUrl('https://test-dummy.net/payment-completed')
            ->setCancelUrl('https://test-dummy.net/payment-canceled')
            ->setCallbackUrl('https://test-dummy.net/payment-callback')
            ->setHostUrls(['https://test-dummy.net']);

        $payeeInfo = new PaymentPayeeInfo();
        $payeeInfo->setPayeeId(PAYEE_ID)
            ->setPayeeReference($this->generateRandomString(12))
            ->setPayeeName('Merchant1')
            ->setProductCategory('A123')
            ->setOrderReference('or-123456')
            ->setSubsite('MySubsite');

        $prefillInfo = new PaymentPrefillInfo();
        $prefillInfo->setMsisdn('+45739000001');

        $price = new PriceItem();
        $price->setType('Vipps')
            ->setAmount(1500)
            ->setVatAmount(0);

        $prices = new PricesCollection();
        $prices->addItem($price);

        $metadata = new Metadata();
        $metadata->setData('order_id', 'or-123456');

        $payment = new Payment();
        $payment->setOperation('Purchase')
            ->setIntent('Authorization')
            ->setCurrency('DKK')
            ->setDescription('Test Purchase')
            ->setUserAgent('Mozilla/5.0...')
            ->setLanguage('sv-SE')
            ->setUrls($url)
            ->setPayeeInfo($payeeInfo)
            ->setPrefillInfo($prefillInfo)
            ->setPrices($prices)
            ->setPayerReference(uniqid())
            ->setMetadata($metadata);

        $this->assertInstanceOf(
            Payment::class,
            $payment->setPrices($prices)
        );
        $this->assertInstanceOf(PricesCollection::class, $payment->getPrices());

        $this->assertInstanceOf(
            Payment::class,
            $payment->setUrls($url)
        );
        $this->assertInstanceOf(PaymentUrl::class, $payment->getUrls());

        $this->assertInstanceOf(
            Payment::class,
            $payment->setPayeeInfo($payeeInfo)
        );
        $this->assertInstanceOf(PaymentPayeeInfo::class, $payment->getPayeeInfo());

        $this->assertInstanceOf(
            Payment::class,
            $payment->setMetadata($metadata)
        );
        $this->assertInstanceOf(Metadata::class, $payment->getMetadata());
    }
}
