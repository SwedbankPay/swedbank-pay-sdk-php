<?php

use PayEx\Api\Service\Payment\Resource\Collection\PricesCollection;
use PayEx\Api\Service\Payment\Resource\Collection\Item\PriceItem;
use PayEx\Api\Service\Swish\Request\Purchase;
use PayEx\Api\Service\Swish\Resource\PaymentPayeeInfo;
use PayEx\Api\Service\Swish\Resource\PaymentPrefillInfo;
use PayEx\Api\Service\Swish\Resource\PaymentSwish;
use PayEx\Api\Service\Swish\Resource\PaymentUrl;
use PayEx\Api\Service\Swish\Resource\Request\Payment;
use PayEx\Api\Service\Swish\Resource\SwishPaymentObject;

use PayEx\Api\Service\Data\ResponseInterface as ResponseServiceInterface;
use PayEx\Api\Service\Swish\Transaction\Request\CreateSale;
use PayEx\Api\Service\Swish\Transaction\Resource\Request\TransactionSale;
use PayEx\Api\Service\Payment\Transaction\Resource\Request\TransactionObject;
use PayEx\Api\Service\Resource\Data\ResponseInterface as ResponseResourceInterface;

class SwishPaymentTest extends TestCase
{
    protected $purchaseRequest;
    protected $saleRequest;

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
        $prefillInfo->setMsisdn('+46760000000');

        $swish = new PaymentSwish();
        $swish->setEcomOnlyEnabled(false);

        $price = new PriceItem();
        $price->setType('Swish')
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
            ->setSwish($swish)
            ->setPrices($prices);

        $swishPaymentObject = new SwishPaymentObject();
        $swishPaymentObject->setPayment($payment);

        $this->purchaseRequest = new Purchase($swishPaymentObject);
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
        $this->assertTrue(($result['payment']['instrument']) === 'Swish');

        $paymentId = str_replace('/psp/swish/payments/', '', $result['payment']['id']);
        return $paymentId;
    }

    /**
     * @depends SwishPaymentTest::testPurchaseRequest
     * @param string $paymentId
     * @throws \PayEx\Api\Client\Exception
     */
    public function testCreateSaleTransaction($paymentId)
    {
        $transactionData = new TransactionSale();
        $transactionData->setMsisdn('+46760000000');

        $transaction = new TransactionObject();
        $transaction->setTransaction($transactionData);

        $this->saleRequest = new CreateSale($transaction);
        $this->saleRequest->setClient($this->client);
        $this->saleRequest->setRequestEndpointVars($paymentId);

        /** @var ResponseServiceInterface $responseService */
        $responseService = $this->saleRequest->send();

        $this->assertInstanceOf(ResponseServiceInterface::class, $responseService);

        /** @var ResponseResourceInterface $response */
        $responseResource = $responseService->getResponseResource();

        $this->assertInstanceOf(ResponseResourceInterface::class, $responseResource);

        $result = $responseService->getResponseData();

        $this->assertTrue(is_array($result));
        $this->assertTrue(isset($result['payment']));
        $this->assertTrue(isset($result['sale']));
        $this->assertTrue(isset($result['sale']['transaction']));
        $this->assertTrue(($result['sale']['transaction']['type']) === 'Sale');
    }
}
