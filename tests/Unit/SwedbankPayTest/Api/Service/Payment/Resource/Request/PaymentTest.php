<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Payment\Resource\Request;

use TestCase;
use SwedbankPay\Api\Service\Payment\Resource\Request\Payment;
use SwedbankPay\Api\Service\Payment\Resource\Request\Data\PaymentRequestInterface;
use SwedbankPay\Api\Service\Payment\Resource\Collection\PricesCollection;
use SwedbankPay\Api\Service\Payment\Resource\Collection\Item\PriceItem;
use SwedbankPay\Api\Service\Payment\Resource\Request\Metadata;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentPayeeInfo;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentPrefillInfo;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentUrl;

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
        $price->setType('Visa')
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

    public function testInitiatingSystemUserAgent()
    {
        $payment = new Payment();

        $this->assertTrue(method_exists($payment, 'getInitiatingSystemUserAgent'));
        $this->assertTrue(method_exists($payment, 'setInitiatingSystemUserAgent'));

        $result = $payment->setInitiatingSystemUserAgent('swedbankpay-sdk-php/123');
        $this->assertInstanceOf(PaymentRequestInterface::class, $result);

        $result = $payment->getInitiatingSystemUserAgent();
        $this->assertEquals('swedbankpay-sdk-php/123', $result);
    }

	public function testMethods()
	{
		$object = new Payment();

		$urls = new PaymentUrl();
		$this->assertInstanceOf(
			Payment::class,
			$object->setUrls($urls)
		);
		$this->assertInstanceOf(PaymentUrl::class, $object->getUrls());

		$payeeInfo = new PaymentPayeeInfo();
		$this->assertInstanceOf(
			Payment::class,
			$object->setPayeeInfo($payeeInfo)
		);
		$this->assertInstanceOf(PaymentPayeeInfo::class, $object->getPayeeInfo());

		$prefillInfo = new PaymentPrefillInfo();
		$this->assertInstanceOf(
			Payment::class,
			$object->setPrefillInfo($prefillInfo)
		);
		$this->assertInstanceOf(PaymentPrefillInfo::class, $object->getPrefillInfo());

		$metadata = new Metadata();
		$this->assertInstanceOf(
			Payment::class,
			$object->setMetadata($metadata)
		);
		$this->assertInstanceOf(Metadata::class, $object->getMetadata());
	}

	public function testMethodsInTrait()
	{
		$object = new Payment();

		$this->assertInstanceOf(
			Payment::class,
			$object->setDescription('test')
		);
		$this->assertEquals('test', $object->getDescription());

		$this->assertInstanceOf(
			Payment::class,
			$object->setCurrency('test')
		);
		$this->assertEquals('test', $object->getCurrency());

		$this->assertInstanceOf(
			Payment::class,
			$object->setUserAgent('test')
		);
		$this->assertEquals('test', $object->getUserAgent());

		$this->assertInstanceOf(
			Payment::class,
			$object->setLanguage('test')
		);
		$this->assertEquals('test', $object->getLanguage());

		$this->assertInstanceOf(
			Payment::class,
			$object->setIntent('test')
		);
		$this->assertEquals('test', $object->getIntent());

		$this->assertInstanceOf(
			Payment::class,
			$object->setPayerReference('test')
		);
		$this->assertEquals('test', $object->getPayerReference());
	}
}
