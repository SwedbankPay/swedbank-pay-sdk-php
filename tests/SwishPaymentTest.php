<?php

use SwedbankPay\Api\Service\Payment\Resource\Collection\PricesCollection;
use SwedbankPay\Api\Service\Payment\Resource\Collection\Item\PriceItem;
use SwedbankPay\Api\Service\Swish\Request\Purchase;
use SwedbankPay\Api\Service\Swish\Resource\Request\PaymentPayeeInfo;
use SwedbankPay\Api\Service\Swish\Resource\Request\PaymentPrefillInfo;
use SwedbankPay\Api\Service\Swish\Resource\Request\PaymentSwish;
use SwedbankPay\Api\Service\Swish\Resource\Request\PaymentUrl;
use SwedbankPay\Api\Service\Swish\Resource\Request\Payment;
use SwedbankPay\Api\Service\Swish\Resource\Request\SwishPaymentObject;

use SwedbankPay\Api\Service\Data\ResponseInterface as ResponseServiceInterface;
use SwedbankPay\Api\Service\Swish\Transaction\Request\CreateSale;
use SwedbankPay\Api\Service\Swish\Transaction\Resource\Request\TransactionSale;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Request\TransactionObject;
use SwedbankPay\Api\Service\Resource\Data\ResponseInterface as ResponseResourceInterface;

class SwishPaymentTest extends TestCase
{
    protected $purchaseRequest;
    protected $saleRequest;

    /**
     * @throws \SwedbankPay\Api\Client\Exception
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
            ->setPayeeReference($this->generateRandomString(30))
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
     * @throws \SwedbankPay\Api\Client\Exception
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
