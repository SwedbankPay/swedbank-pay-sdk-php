<?php

// phpcs:disable
use SwedbankPay\Api\Service\Payment\Resource\Collection\PricesCollection;
use SwedbankPay\Api\Service\Payment\Resource\Collection\Item\PriceItem;
use SwedbankPay\Api\Service\Trustly\Request\Purchase;
use SwedbankPay\Api\Service\Trustly\Resource\Request\PaymentPayeeInfo;
use SwedbankPay\Api\Service\Trustly\Resource\Request\PaymentPrefillInfo;
use SwedbankPay\Api\Service\Trustly\Resource\Request\PaymentUrl;
use SwedbankPay\Api\Service\Trustly\Resource\Request\Payment;
use SwedbankPay\Api\Service\Trustly\Resource\Request\PaymentObject;
use SwedbankPay\Api\Service\Payment\Resource\Request\Metadata;

use SwedbankPay\Api\Service\Data\ResponseInterface as ResponseServiceInterface;
use SwedbankPay\Api\Service\Resource\Data\ResponseInterface as ResponseResourceInterface;

use SwedbankPay\Api\Service\Trustly\Transaction\Request\CreateReversal;
use SwedbankPay\Api\Service\Trustly\Transaction\Resource\Request\TransactionReversal;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Request\TransactionObject;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\SaleObject;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\ReversalObject;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\TransactionObject as TransactionObjectResponse;

use SwedbankPay\Api\Service\Trustly\Transaction\Request\GetSale;
use SwedbankPay\Api\Service\Trustly\Transaction\Request\GetReversal;
use SwedbankPay\Api\Service\Trustly\Transaction\Request\GetTransaction;

use SwedbankPay\Api\Service\Trustly\Transaction\Request\GetSales;
use SwedbankPay\Api\Service\Trustly\Transaction\Request\GetReversals;
use SwedbankPay\Api\Service\Trustly\Transaction\Request\GetTransactions;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\SalesObject;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\ReversalsObject;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\TransactionsObject;
// phpcs:enable

/**
 * Class TrustlyPaymentTest
 * @SuppressWarnings(PHPMD.TooManyMethods)
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class TrustlyPaymentTest extends TestCase
{
    protected $paymentId = '/psp/trustly/payments/e72c779a-fcdc-4464-ef64-08d85013b189';

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
            ->setPrices($prices)
            ->setMetadata($metadata);

        $paymentObject = new PaymentObject();
        $paymentObject->setPayment($payment);

        $purchaseRequest = new Purchase($paymentObject);
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
        $this->assertEquals('Trustly', $result['payment']['instrument']);

        return $result['payment']['id'];
    }

    /**
     * @depends TrustlyPaymentTest::testPurchaseRequest
     * @param string $paymentId
     */
    public function testReversal($paymentId)
    {
        $this->assertIsString($paymentId);

        $transactionData = new TransactionReversal();
        $transactionData->setAmount(100)
            ->setVatAmount(0)
            ->setDescription('Test refund')
            ->setPayeeReference($this->generateRandomString(12));

        $transaction = new TransactionObject();
        $transaction->setTransaction($transactionData);

        $requestService = new CreateReversal($transaction);
        $requestService->setClient($this->client)
            //->setPaymentId($this->paymentId)
            ->setRequestEndpointVars(preg_replace('|/psp/[^/]+/payments/|', '', $this->paymentId));

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

    public function testGetSales()
    {
        $requestService = new GetSales();
        $requestService->setClient($this->client)
            //->setPaymentId($this->paymentId)
            ->setRequestEndpointVars(preg_replace('|/psp/[^/]+/payments/|', '', $this->paymentId));

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
     * @depends TrustlyPaymentTest::testGetSales
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

    public function testGetReversals()
    {
        $requestService = new GetReversals();
        $requestService->setClient($this->client)
            //->setPaymentId($this->paymentId)
            ->setRequestEndpointVars(preg_replace('|/psp/[^/]+/payments/|', '', $this->paymentId));

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
     * @depends TrustlyPaymentTest::testGetReversals
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

    public function testGetTransactions()
    {
        $requestService = new GetTransactions();
        $requestService->setClient($this->client)
            //->setPaymentId($this->paymentId)
            ->setRequestEndpointVars(preg_replace('|/psp/[^/]+/payments/|', '', $this->paymentId));

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
     * @depends TrustlyPaymentTest::testGetTransactions
     * @param array $transactions
     */
    public function testGetTransaction($transactions)
    {
        foreach ($transactions['transaction_list'] as $transaction) {
            $requestService = new GetTransaction();
            $requestService->setClient($this->client)
                ->setRequestEndpoint($transaction['id']);

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
