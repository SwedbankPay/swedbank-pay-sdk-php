<?php

use SwedbankPay\Api\Service\Payment\Resource\Collection\PricesCollection;
use SwedbankPay\Api\Service\Payment\Resource\Collection\Item\PriceItem;
use SwedbankPay\Api\Service\Trustly\Request\Purchase;
use SwedbankPay\Api\Service\Trustly\Resource\Request\PaymentPayeeInfo;
use SwedbankPay\Api\Service\Trustly\Resource\Request\PaymentPrefillInfo;
use SwedbankPay\Api\Service\Trustly\Resource\Request\PaymentUrl;
use SwedbankPay\Api\Service\Trustly\Resource\Request\Payment;
use SwedbankPay\Api\Service\Trustly\Resource\Request\PaymentObject;

use SwedbankPay\Api\Service\Data\ResponseInterface as ResponseServiceInterface;
use SwedbankPay\Api\Service\Resource\Data\ResponseInterface as ResponseResourceInterface;

class TrustlyPaymentTest extends TestCase
{
    protected $purchaseRequest;

    /**
     * @throws \SwedbankPay\Api\Client\Exception
     */
    public function testPurchaseRequest()
    {
        $url = new PaymentUrl();
        $url->setCompleteUrl('http://test-dummy.net/payment-completed')
            ->setCancelUrl('http://test-dummy.net/payment-canceled')
            ->setPaymentUrl('https://example.com/perform-payment')
            ->setCallbackUrl('http://test-dummy.net/payment-callback')
            ->setLogoUrl('https://example.com/logo.png')
            ->setTermsOfService('https://example.com/terms.pdf')
            ->setHostUrls(['http://test-dummy.net', 'https://example.com']);

        $payeeInfo = new PaymentPayeeInfo();
        $payeeInfo->setPayeeId(PAYEE_ID)
            ->setPayeeReference($this->generateRandomString(12))
            ->setPayeeName('Merchant1')
            ->setProductCategory('A123')
            ->setOrderReference('or-123456')
            ->setSubsite('MySubsite');

        $prefillInfo = new PaymentPrefillInfo();
        $prefillInfo->setMsisdn('+4759212345');

        $price = new PriceItem();
        $price->setType('Trustly')
            ->setAmount(1500)
            ->setVatAmount(0);

        $prices = new PricesCollection();
        $prices->addItem($price);

        $payment = new Payment();
        $payment->setOperation('Purchase')
            ->setIntent('Sale')
            ->setCurrency('SEK')
            ->setDescription('Test Purchase')
            ->setUserAgent('Mozilla/5.0...')
            ->setLanguage('nb-NO')
            ->setUrls($url)
            ->setPayeeInfo($payeeInfo)
            ->setPrefillInfo($prefillInfo)
            ->setPrices($prices);

        $trustlyPaymentObject = new PaymentObject();
        $trustlyPaymentObject->setPayment($payment);

        $this->purchaseRequest = new Purchase($trustlyPaymentObject);
        $this->purchaseRequest->setClient($this->client);

        /** @var ResponseServiceInterface $responseService */
        $responseService = $this->purchaseRequest->send();

        $this->assertInstanceOf(ResponseServiceInterface::class, $responseService);

        /** @var ResponseResourceInterface $response */
        $responseResource = $responseService->getResponseResource();

        $this->assertInstanceOf(ResponseResourceInterface::class, $responseResource);

        $result = $responseService->getResponseData();

        $this->assertTrue(is_array($result));
        $this->assertTrue(isset($result['payment']));
        $this->assertTrue(isset($result['operations']));
        $this->assertTrue(($result['payment']['operation']) === 'Purchase');
        $this->assertTrue(($result['payment']['instrument']) === 'Trustly');
    }
}
