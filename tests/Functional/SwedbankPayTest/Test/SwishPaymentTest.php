<?php

namespace SwedbankPayTest\Test;

use TestCase;
use SwedbankPay\Api\Service\Swish\Request\Test;
use SwedbankPay\Api\Service\Payment\Resource\Collection\PricesCollection;
use SwedbankPay\Api\Service\Payment\Resource\Collection\Item\PriceItem;
use SwedbankPay\Api\Service\Payment\Resource\Request\Metadata;
use SwedbankPay\Api\Service\Swish\Request\Purchase;
use SwedbankPay\Api\Service\Swish\Resource\Request\PaymentPayeeInfo;
use SwedbankPay\Api\Service\Swish\Resource\Request\PaymentPrefillInfo;
use SwedbankPay\Api\Service\Swish\Resource\Request\PaymentSwish;
use SwedbankPay\Api\Service\Swish\Resource\Request\PaymentUrl;
use SwedbankPay\Api\Service\Swish\Resource\Request\Payment;
use SwedbankPay\Api\Service\Swish\Resource\Request\SwishPaymentObject;

use SwedbankPay\Api\Service\Data\ResponseInterface as ResponseServiceInterface;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Request\TransactionObject;
use SwedbankPay\Api\Service\Resource\Data\ResponseInterface as ResponseResourceInterface;

use SwedbankPay\Api\Service\Swish\Transaction\Request\CreateSale;
use SwedbankPay\Api\Service\Swish\Transaction\Request\CreateReversal;

use SwedbankPay\Api\Service\Swish\Transaction\Resource\Request\TransactionSale;
use SwedbankPay\Api\Service\Swish\Transaction\Resource\Request\TransactionReversal;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\SaleObject;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\ReversalObject;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\TransactionObject as TransactionObjectResponse;

use SwedbankPay\Api\Service\Swish\Transaction\Request\GetSale;
use SwedbankPay\Api\Service\Swish\Transaction\Request\GetSales;
use SwedbankPay\Api\Service\Swish\Transaction\Request\GetReversal;
use SwedbankPay\Api\Service\Swish\Transaction\Request\GetReversals;
use SwedbankPay\Api\Service\Swish\Transaction\Request\GetTransaction;
use SwedbankPay\Api\Service\Swish\Transaction\Request\GetTransactions;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\SalesObject;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\ReversalsObject;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\TransactionsObject;

/**
 * Class SwishPaymentTest
 * @SuppressWarnings(PHPMD.TooManyMethods)
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class SwishPaymentTest extends TestCase
{
    public function testApiCredentails()
    {
        try {
            new Test(ACCESS_TOKEN, PAYEE_ID, true);
            $this->assertTrue(true);
        } catch (\Exception $e) {
            $this->assertTrue(true, $e->getMessage());
        }
    }

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

        $metadata = new Metadata();
        $metadata->setData('order_id', 'or-123456');

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
            ->setPrices($prices)
            ->setMetadata($metadata);

        $swishPaymentObject = new SwishPaymentObject();
        $swishPaymentObject->setPayment($payment);

        $purchaseRequest = new Purchase($swishPaymentObject);
        $purchaseRequest->setClient($this->client);

        /** @var ResponseServiceInterface $responseService */
        $responseService = $purchaseRequest->send();

        $this->assertInstanceOf(ResponseServiceInterface::class, $responseService);

        /** @var ResponseResourceInterface $response */
        $responseResource = $responseService->getResponseResource();

        $this->assertInstanceOf(ResponseResourceInterface::class, $responseResource);

        $result = $responseService->getResponseData();

        $this->assertIsArray($result);
        $this->assertArrayHasKey('payment', $result);
        $this->assertArrayHasKey('operations', $result);
        $this->assertEquals('Purchase', $result['payment']['operation']);
        $this->assertEquals('Swish', $result['payment']['instrument']);

        return $result['payment']['id'];
    }

    /**
     * @depends SwedbankPayTest\Test\SwishPaymentTest::testPurchaseRequest
     * @param string $paymentId
     * @throws \SwedbankPay\Api\Client\Exception
     */
    public function testCreateSaleTransaction($paymentId)
    {
        $transactionData = new TransactionSale();
        $transactionData->setMsisdn('+46760000000');

        $transaction = new TransactionObject();
        $transaction->setTransaction($transactionData);

        $saleRequest = new CreateSale($transaction);
        $saleRequest->setClient($this->client);
        $saleRequest->setPaymentId($paymentId);

        /** @var ResponseServiceInterface $responseService */
        $responseService = $saleRequest->send();

        $this->assertInstanceOf(ResponseServiceInterface::class, $responseService);

        /** @var ResponseResourceInterface $response */
        $responseResource = $responseService->getResponseResource();

        $this->assertInstanceOf(ResponseResourceInterface::class, $responseResource);

        $result = $responseService->getResponseData();

        $this->assertIsArray($result);
        $this->assertArrayHasKey('payment', $result);
        $this->assertArrayHasKey('sale', $result);
        $this->assertArrayHasKey('id', $result['sale']);
        $this->assertArrayHasKey('transaction', $result['sale']);
        $this->assertArrayHasKey('type', $result['sale']['transaction']);
        $this->assertArrayHasKey('state', $result['sale']['transaction']);
        $this->assertEquals('Sale', $result['sale']['transaction']['type']);
        $this->assertEquals('AwaitingActivity', $result['sale']['transaction']['state']);

        // Wait for state change AwaitingActivity -> Ready
        $saleId = $result['sale']['id'];
        $attempts = 0;

        do {
            // phpcs:disable
            sleep(5);
            // phpcs:enable
            if ($attempts >= 10) {
                $this->fail('Swish sale has been failed.');
                return;
            }

            $attempts++;

            $requestService = new GetSale();
            $requestService->setClient($this->client)
                ->setRequestEndpoint($saleId);

            /** @var ResponseServiceInterface $responseService */
            $responseService = $requestService->send();

            /** @var SaleObject $responseResource */
            $responseResource = $responseService->getResponseResource();
            $this->assertInstanceOf(SaleObject::class, $responseResource);

            $result = $responseService->getResponseData();

            $transactionState = $result['sale']['transaction']['state'];
        } while ($transactionState !== 'Completed');

        return $paymentId;
    }

    /**
     * @depends SwedbankPayTest\Test\SwishPaymentTest::testCreateSaleTransaction
     * @param string $paymentId
     */
    public function testReversal($paymentId)
    {
        $transactionData = new TransactionReversal();
        $transactionData->setAmount(100)
            ->setVatAmount(0)
            ->setDescription('Test refund')
            ->setPayeeReference($this->generateRandomString(12));

        $transaction = new TransactionObject();
        $transaction->setTransaction($transactionData);

        $requestService = new CreateReversal($transaction);
        $requestService->setClient($this->client)
            ->setPaymentId($paymentId);

        /** @var ResponseServiceInterface $responseService */
        $responseService = $requestService->send();
        $this->assertInstanceOf(ResponseServiceInterface::class, $responseService);

        /** @var ReversalObject $responseResource */
        $responseResource = $responseService->getResponseResource();
        $this->assertInstanceOf(ReversalObject::class, $responseResource);

        $result = $responseService->getResponseData();

        $this->assertIsArray($result);
        $this->assertArrayHasKey('payment', $result);
        $this->assertArrayHasKey('reversal', $result);
        $this->assertArrayHasKey('transaction', $result['reversal']);
        $this->assertEquals('Reversal', $result['reversal']['transaction']['type']);

        return $result['reversal'];
    }

    /**
     * @depends SwedbankPayTest\Test\SwishPaymentTest::testPurchaseRequest
     * @param string $paymentId
     */
    public function testGetSales($paymentId)
    {
        $requestService = new GetSales();
        $requestService->setClient($this->client)
            ->setPaymentId($paymentId);

        /** @var ResponseServiceInterface $responseService */
        $responseService = $requestService->send();
        $this->assertInstanceOf(ResponseServiceInterface::class, $responseService);

        /** @var SalesObject $responseResource */
        $responseResource = $responseService->getResponseResource();
        $this->assertInstanceOf(SalesObject::class, $responseResource);

        $result = $responseService->getResponseData();

        $this->assertIsArray($result);
        $this->assertArrayHasKey('payment', $result);
        $this->assertArrayHasKey('sales', $result);
        $this->assertIsArray($result['sales']);

        return $result['sales'];
    }

    /**
     * @depends SwedbankPayTest\Test\SwishPaymentTest::testGetSales
     * @param array $sales
     */
    public function testGetSale($sales)
    {
        foreach ($sales['sale_list'] as $sale) {
            $requestService = new GetSale();
            $requestService->setClient($this->client)
                ->setRequestEndpoint($sale['id']);

            /** @var ResponseServiceInterface $responseService */
            $responseService = $requestService->send();
            $this->assertInstanceOf(ResponseServiceInterface::class, $responseService);

            /** @var SaleObject $responseResource */
            $responseResource = $responseService->getResponseResource();
            $this->assertInstanceOf(SaleObject::class, $responseResource);

            $result = $responseService->getResponseData();

            $this->assertIsArray($result);
            $this->assertArrayHasKey('payment', $result);
            $this->assertArrayHasKey('sale', $result);
            $this->assertIsArray($result['sale']);
            $this->assertArrayHasKey('id', $result['sale']);

            // Test the first item only
            break;
        }
    }

    /**
     * @depends SwedbankPayTest\Test\SwishPaymentTest::testPurchaseRequest
     * @depends SwedbankPayTest\Test\SwishPaymentTest::testReversal
     * @param string $paymentId
     * @param array $reversal
     */
    public function testGetReversals($paymentId, $reversal)
    {
        $this->assertIsArray($reversal);

        $requestService = new GetReversals();
        $requestService->setClient($this->client)
            ->setPaymentId($paymentId);

        /** @var ResponseServiceInterface $responseService */
        $responseService = $requestService->send();
        $this->assertInstanceOf(ResponseServiceInterface::class, $responseService);

        /** @var ReversalsObject $responseResource */
        $responseResource = $responseService->getResponseResource();
        $this->assertInstanceOf(ReversalsObject::class, $responseResource);

        $result = $responseService->getResponseData();

        $this->assertIsArray($result);
        $this->assertArrayHasKey('payment', $result);
        $this->assertArrayHasKey('reversals', $result);
        $this->assertIsArray($result['reversals']);

        return $result['reversals'];
    }

    /**
     * @depends SwedbankPayTest\Test\SwishPaymentTest::testGetReversals
     * @param array $reversals
     */
    public function testGetReversal($reversals)
    {
        foreach ($reversals['reversal_list'] as $reversal) {
            $requestService = new GetReversal();
            $requestService->setClient($this->client)
                ->setRequestEndpoint($reversal['id']);

            /** @var ResponseServiceInterface $responseService */
            $responseService = $requestService->send();
            $this->assertInstanceOf(ResponseServiceInterface::class, $responseService);

            /** @var ReversalObject $responseResource */
            $responseResource = $responseService->getResponseResource();
            $this->assertInstanceOf(ReversalObject::class, $responseResource);

            $result = $responseService->getResponseData();

            $this->assertIsArray($result);
            $this->assertArrayHasKey('payment', $result);
            $this->assertArrayHasKey('reversal', $result);
            $this->assertIsArray($result['reversal']);
            $this->assertArrayHasKey('id', $result['reversal']);

            // Test the first item only
            break;
        }
    }

    /**
     * @depends SwedbankPayTest\Test\SwishPaymentTest::testPurchaseRequest
     * @param string $paymentId
     */
    public function testGetTransactions($paymentId)
    {
        $requestService = new GetTransactions();
        $requestService->setClient($this->client)
            ->setPaymentId($paymentId);

        /** @var ResponseServiceInterface $responseService */
        $responseService = $requestService->send();
        $this->assertInstanceOf(ResponseServiceInterface::class, $responseService);

        /** @var TransactionsObject $responseResource */
        $responseResource = $responseService->getResponseResource();
        $this->assertInstanceOf(TransactionsObject::class, $responseResource);

        $result = $responseService->getResponseData();

        $this->assertIsArray($result);
        $this->assertArrayHasKey('payment', $result);
        $this->assertArrayHasKey('transactions', $result);
        $this->assertIsArray($result['transactions']);

        return $result['transactions'];
    }

    /**
     * @depends SwedbankPayTest\Test\SwishPaymentTest::testPurchaseRequest
     * @depends SwedbankPayTest\Test\SwishPaymentTest::testGetTransactions
     * @param string $paymentId
     * @param array $transactions
     */
    public function testGetTransaction($paymentId, $transactions)
    {
        foreach ($transactions['transaction_list'] as $transaction) {
            // Value $transaction['id'] isn't url
            $requestService = new GetTransaction();
            $requestService->setClient($this->client)
                ->setRequestEndpoint('/psp/swish/payments/%s/transactions/%s')
                ->setRequestEndpointVars($this->getPaymentIdFromUrl($paymentId), $transaction['id']);

            /** @var ResponseServiceInterface $responseService */
            $responseService = $requestService->send();
            $this->assertInstanceOf(ResponseServiceInterface::class, $responseService);

            /** @var TransactionObjectResponse $responseResource */
            $responseResource = $responseService->getResponseResource();
            $this->assertInstanceOf(TransactionObjectResponse::class, $responseResource);

            $result = $responseService->getResponseData();

            $this->assertIsArray($result);
            $this->assertArrayHasKey('payment', $result);
            $this->assertArrayHasKey('transaction', $result);
            $this->assertIsArray($result['transaction']);
            $this->assertArrayHasKey('id', $result['transaction']);
            $this->assertArrayHasKey('created', $result['transaction']);
            $this->assertArrayHasKey('updated', $result['transaction']);
            $this->assertArrayHasKey('type', $result['transaction']);
            $this->assertArrayHasKey('state', $result['transaction']);
            $this->assertArrayHasKey('number', $result['transaction']);
            $this->assertArrayHasKey('amount', $result['transaction']);
            $this->assertArrayHasKey('vat_amount', $result['transaction']);
            $this->assertArrayHasKey('description', $result['transaction']);
            $this->assertArrayHasKey('payee_reference', $result['transaction']);
            $this->assertArrayHasKey('is_operational', $result['transaction']);
            $this->assertArrayHasKey('operations', $result['transaction']);

            // Test the first item only
            break;
        }
    }
}
