<?php

use SwedbankPay\Api\Service\Creditcard\Request\Purchase;
use SwedbankPay\Api\Service\Creditcard\Request\Verify;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentPurchaseCreditcard;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentPurchaseObject;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentUrl;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentVerifyCreditcard;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentVerifyObject;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentPurchase;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentVerify;
use SwedbankPay\Api\Service\Payment\Resource\Collection\PricesCollection;
use SwedbankPay\Api\Service\Payment\Resource\Collection\Item\PriceItem;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentPayeeInfo;

use SwedbankPay\Api\Service\Data\ResponseInterface as ResponseServiceInterface;
use SwedbankPay\Api\Service\Resource\Data\ResponseInterface as ResponseResourceInterface;

class CardPaymentTest extends TestCase
{
    protected $purchaseRequest;
    protected $verifyRequest;

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
            ->setHostUrls(['https://example.com', 'https://example.net']);

        $payeeInfo = new PaymentPayeeInfo();
        $payeeInfo->setPayeeId(PAYEE_ID)
            ->setPayeeReference($this->generateRandomString(30))
            ->setPayeeName('Merchant1')
            ->setProductCategory('A123')
            ->setOrderReference('or-123456')
            ->setSubsite('MySubsite');

        $price = new PriceItem();
        $price->setType('Creditcard')
            ->setAmount(1500)
            ->setVatAmount(0);

        $prices = new PricesCollection();
        $prices->addItem($price);

        $creditCard = new PaymentPurchaseCreditcard();
        $creditCard->setNo3DSecure(false)
            ->setMailOrderTelephoneOrder(false)
            ->setRejectCardNot3DSecureEnrolled(false)
            ->setRejectCreditCards(false)
            ->setRejectDebitCards(false)
            ->setRejectConsumerCards(false)
            ->setRejectCorporateCards(false)
            ->setRejectAuthenticationStatusA(false)
            ->setRejectAuthenticationStatusU(false);

        $payment = new PaymentPurchase();
        $payment->setOperation('Purchase')
            ->setIntent('Authorization')
            ->setCurrency('SEK')
            ->setPaymentToken('')
            ->setGeneratePaymentToken(true)
            ->setDescription('Test Purchase')
            ->setUserAgent('Mozilla/5.0...')
            ->setLanguage('sv-SE')
            ->setPayerReference($this->generateRandomString(30))
            ->setUrls($url)
            ->setPayeeInfo($payeeInfo)
            ->setPrices($prices);

        $paymentObject = new PaymentPurchaseObject();
        $paymentObject->setPayment($payment);
        $paymentObject->setCreditCard($creditCard);


        $this->purchaseRequest = new Purchase($paymentObject);
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

        $paymentId = str_replace('/psp/creditcard/payments/', '', $result['payment']['id']);
        return $paymentId;
    }

    /**
     * @throws \SwedbankPay\Api\Client\Exception
     */
    public function testVerifyRequest()
    {
        $url = new PaymentUrl();
        $url->setCompleteUrl('http://test-dummy.net/payment-completed')
            ->setCancelUrl('http://test-dummy.net/payment-canceled')
            ->setCallbackUrl('http://test-dummy.net/payment-callback')
            ->setLogoUrl('https://example.com/logo.png')
            ->setTermsOfService('https://example.com/terms.pdf')
            ->setHostUrls(['https://example.com', 'https://example.net']);

        $payeeInfo = new PaymentPayeeInfo();
        $payeeInfo->setPayeeId(PAYEE_ID)
            ->setPayeeReference($this->generateRandomString(30))
            ->setPayeeName('Merchant1')
            ->setProductCategory('A123')
            ->setOrderReference('or-123456')
            ->setSubsite('MySubsite');

        $creditCard = new PaymentVerifyCreditcard();
        $creditCard->setNo3DSecure(false)
            ->setRejectCardNot3DSecureEnrolled(false)
            ->setRejectCreditCards(false)
            ->setRejectDebitCards(false)
            ->setRejectConsumerCards(false)
            ->setRejectCorporateCards(false)
            ->setRejectAuthenticationStatusA(false)
            ->setNoCvc(false);

        $payment = new PaymentVerify();
        $payment->setOperation('Verify')
            ->setIntent('Authorization')
            ->setCurrency('SEK')
            ->setDescription('Test Purchase')
            ->setUserAgent('Mozilla/5.0...')
            ->setLanguage('sv-SE')
            ->setPayerReference($this->generateRandomString(30))
            ->setUrls($url)
            ->setPayeeInfo($payeeInfo);

        $paymentObject = new PaymentVerifyObject();
        $paymentObject->setPayment($payment);
        $paymentObject->setCreditCard($creditCard);


        $this->verifyRequest = new Verify($paymentObject);
        $this->verifyRequest->setClient($this->client);

        /** @var ResponseServiceInterface $responseService */
        $responseService = $this->verifyRequest->send();

        $this->assertInstanceOf(ResponseServiceInterface::class, $responseService);

        /** @var ResponseResourceInterface $response */
        $responseResource = $responseService->getResponseResource();

        $this->assertInstanceOf(ResponseResourceInterface::class, $responseResource);

        $result = $responseService->getResponseData();

        $this->assertTrue(is_array($result));
        $this->assertTrue(isset($result['payment']));
        $this->assertTrue(isset($result['operations']));
        $this->assertTrue(($result['payment']['operation']) === 'Verify');

        $paymentId = str_replace('/psp/invoice/payments/', '', $result['payment']['id']);
        return $paymentId;
    }


}
