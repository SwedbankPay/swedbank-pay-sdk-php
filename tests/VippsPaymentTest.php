<?php

use PayEx\Api\Service\Payment\Resource\Collection\PricesCollection;
use PayEx\Api\Service\Payment\Resource\Collection\Item\PriceItem;
use PayEx\Api\Service\Payment\Transaction\Resource\Request\TransactionObject;
use PayEx\Api\Service\Vipps\Request\Purchase;
use PayEx\Api\Service\Vipps\Resource\PaymentPayeeInfo;
use PayEx\Api\Service\Vipps\Resource\PaymentPrefillInfo;
use PayEx\Api\Service\Vipps\Resource\PaymentUrl;
use PayEx\Api\Service\Vipps\Resource\Request\Payment;
use PayEx\Api\Service\Vipps\Resource\VippsPaymentObject;

use PayEx\Api\Service\Data\ResponseInterface as ResponseServiceInterface;
use PayEx\Api\Service\Vipps\Transaction\Request\CreateAuthorization;
use PayEx\Api\Service\Vipps\Transaction\Resource\Request\TransactionAuthorization;
use PayEx\Api\Service\Resource\Data\ResponseInterface as ResponseResourceInterface;

class VippsPaymentTest extends TestCase
{
    protected $purchaseRequest;
    protected $authorizationRequest;

    /**
     * @throws \PayEx\Api\Client\Exception
     */
    public function testPurchaseRequest()
    {
        $url = new PaymentUrl();
        $url->setCompleteUrl('http://test-dummy.net/payment-completed')
            ->setCancelUrl('http://test-dummy.net/payment-canceled')
            ->setCallbackUrl('http://test-dummy.net/payment-callback')
            ->setLogoUrl('https://example.com/logo.png')
            ->setTermsOfService('https://example.com/terms.pdf');

        $payeeInfo = new PaymentPayeeInfo();
        $payeeInfo->setPayeeId(PAYEE_ID)
            ->setPayeeReference($this->generateRandomString())
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
     * @throws \PayEx\Api\Client\Exception
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
