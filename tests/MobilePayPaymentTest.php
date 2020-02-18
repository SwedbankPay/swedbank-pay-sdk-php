<?php

use SwedbankPay\Api\Service\Payment\Resource\Collection\PricesCollection;
use SwedbankPay\Api\Service\Payment\Resource\Collection\Item\PriceItem;
use SwedbankPay\Api\Service\MobilePay\Request\Purchase;

use SwedbankPay\Api\Service\MobilePay\Resource\Request\PaymentPayeeInfo;
use SwedbankPay\Api\Service\MobilePay\Resource\Request\PaymentPrefillInfo;
use SwedbankPay\Api\Service\MobilePay\Resource\Request\PaymentUrl;
use SwedbankPay\Api\Service\MobilePay\Resource\Request\Payment;
use SwedbankPay\Api\Service\MobilePay\Resource\Request\MobilePayPaymentObject;

use SwedbankPay\Api\Service\Data\ResponseInterface as ResponseServiceInterface;
use SwedbankPay\Api\Service\Resource\Data\ResponseInterface as ResponseResourceInterface;

class MobilePayPaymentTest extends TestCase
{
    protected $purchaseRequest;
    protected $authorizationRequest;

    /**
     * @throws \SwedbankPay\Api\Client\Exception
     */
    public function testPurchaseRequest()
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
            ->setPayerReference(uniqid());

        $mobilePayPaymentObject = new MobilePayPaymentObject();
        $mobilePayPaymentObject->setPayment($payment);
        $mobilePayPaymentObject->setShoplogoUrl('https://test-dummy.net/logo.png');

        $this->purchaseRequest = new Purchase($mobilePayPaymentObject);
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
        $this->assertTrue(($result['payment']['instrument']) === 'MobilePay');

        $paymentId = preg_replace('|/psp/[^/]+/payments/|', '', $result['payment']['id']);
        return $paymentId;
    }
}
