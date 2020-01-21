<?php

use SwedbankPay\Api\Service\Payment\Resource\Collection\PricesCollection;
use SwedbankPay\Api\Service\Payment\Resource\Collection\Item\PriceItem;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Request\TransactionObject;
use SwedbankPay\Api\Service\Vipps\Request\Purchase;
use SwedbankPay\Api\Service\Vipps\Resource\Request\PaymentPayeeInfo;
use SwedbankPay\Api\Service\Vipps\Resource\Request\PaymentPrefillInfo;
use SwedbankPay\Api\Service\Vipps\Resource\Request\PaymentUrl;
use SwedbankPay\Api\Service\Vipps\Resource\Request\Payment;
use SwedbankPay\Api\Service\Vipps\Resource\Request\VippsPaymentObject;

use SwedbankPay\Api\Service\Data\ResponseInterface as ResponseServiceInterface;
use SwedbankPay\Api\Service\Vipps\Transaction\Request\CreateAuthorization;
use SwedbankPay\Api\Service\Vipps\Transaction\Resource\Request\TransactionAuthorization;
use SwedbankPay\Api\Service\Resource\Data\ResponseInterface as ResponseResourceInterface;

class VippsPaymentTest extends TestCase
{
    protected $purchaseRequest;
    protected $authorizationRequest;

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
            ->setTermsOfService('https://example.com/terms.pdf');

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
        $price->setType('Vipps')
            ->setAmount(1500)
            ->setVatAmount(0);

        $prices = new PricesCollection();
        $prices->addItem($price);

        $payment = new Payment();
        $payment->setOperation('Purchase')
            ->setIntent('Authorization')
            ->setCurrency('NOK')
            ->setDescription('Test Purchase')
            ->setUserAgent('Mozilla/5.0...')
            ->setLanguage('nb-NO')
            ->setUrls($url)
            ->setPayeeInfo($payeeInfo)
            ->setPrefillInfo($prefillInfo)
            ->setPrices($prices);

        $vippsPaymentObject = new VippsPaymentObject();
        $vippsPaymentObject->setPayment($payment);

        $this->purchaseRequest = new Purchase($vippsPaymentObject);
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
        $this->assertTrue(($result['payment']['instrument']) === 'Vipps');

        $paymentId = preg_replace('|/psp/[^/]+/payments/|', '', $result['payment']['id']);
        return $paymentId;
    }

    /**
     * @depends VippsPaymentTest::testPurchaseRequest
     * @param string $paymentId
     * @throws \SwedbankPay\Api\Client\Exception
     */
    public function testCreateAuthorizationTransaction($paymentId)
    {
        $transactionData = new TransactionAuthorization();
        $transactionData->setMsisdn('+4759212345');

        $transaction = new TransactionObject();
        $transaction->setTransaction($transactionData);

        $this->authorizationRequest = new CreateAuthorization($transaction);
        $this->authorizationRequest->setClient($this->client);
        $this->authorizationRequest->setRequestEndpointVars($paymentId);

        /** @var ResponseServiceInterface $responseService */
        $responseService = $this->authorizationRequest->send();

        $this->assertInstanceOf(ResponseServiceInterface::class, $responseService);

        /** @var ResponseResourceInterface $response */
        $responseResource = $responseService->getResponseResource();

        $this->assertInstanceOf(ResponseResourceInterface::class, $responseResource);

        $result = $responseService->getResponseData();

        $this->assertTrue(is_array($result));
        $this->assertTrue(isset($result['payment']));
        $this->assertTrue(isset($result['authorization']));
        $this->assertTrue(isset($result['authorization']['transaction']));
        $this->assertTrue(($result['authorization']['transaction']['type']) === 'Authorization');
    }
}
