<?php

namespace SwedbankPayTest\Test;

use TestCase;
use SwedbankPay\Api\Service\Invoice\Request\Test;
use SwedbankPay\Api\Client\Exception as ClientException;
use SwedbankPay\Api\Service\Consumer\Resource\ConsumerAddress;
use SwedbankPay\Api\Service\Invoice\Request\CreateApprovedLegalAddress;
use SwedbankPay\Api\Service\Invoice\Request\CreateInvoice;
use SwedbankPay\Api\Service\Invoice\Resource\Request\AddresseeObject;
use SwedbankPay\Api\Service\Invoice\Resource\Request\Addressee;
use SwedbankPay\Api\Service\Invoice\Resource\Request\Invoice;
use SwedbankPay\Api\Service\Invoice\Transaction\Resource\Request\Consumer;
use SwedbankPay\Api\Service\Invoice\Transaction\Resource\Request\Transaction;
use SwedbankPay\Api\Service\Payment\Resource\Collection\PricesCollection;
use SwedbankPay\Api\Service\Payment\Resource\Collection\Item\PriceItem;
use SwedbankPay\Api\Service\Payment\Resource\Request\Metadata;
use SwedbankPay\Api\Service\Invoice\Resource\Request\PaymentPayeeInfo;
use SwedbankPay\Api\Service\Invoice\Resource\Request\PaymentUrl;
use SwedbankPay\Api\Service\Invoice\Resource\Request\Payment;
use SwedbankPay\Api\Service\Invoice\Resource\Request\InvoicePaymentObject;

use SwedbankPay\Api\Service\Data\ResponseInterface as ResponseServiceInterface;
use SwedbankPay\Api\Service\Invoice\Transaction\Request\CreateAuthorization;
use SwedbankPay\Api\Service\Invoice\Transaction\Resource\Request\Authorization;
use SwedbankPay\Api\Service\Resource\Data\ResponseInterface as ResponseResourceInterface;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Request\TransactionObject;

use SwedbankPay\Api\Service\Invoice\Transaction\Request\CreateCapture;
use SwedbankPay\Api\Service\Invoice\Transaction\Request\CreateReversal;
use SwedbankPay\Api\Service\Invoice\Transaction\Resource\Request\Capture as TransactionCapture;
use SwedbankPay\Api\Service\Invoice\Transaction\Resource\Request\Reversal as TransactionReversal;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\AuthorizationObject;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\CaptureObject;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\ReversalObject;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\CancellationObject;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\TransactionObject as TransactionObjectResponse;

use SwedbankPay\Api\Service\Invoice\Transaction\Request\GetAuthorizations;
use SwedbankPay\Api\Service\Invoice\Transaction\Request\GetCaptures;
use SwedbankPay\Api\Service\Invoice\Transaction\Request\GetReversals;
use SwedbankPay\Api\Service\Invoice\Transaction\Request\GetCancellations;
use SwedbankPay\Api\Service\Invoice\Transaction\Request\GetTransactions;

use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\AuthorizationsObject;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\CancellationsObject;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\CapturesObject;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\ReversalsObject;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\TransactionsObject;

use SwedbankPay\Api\Service\Invoice\Transaction\Request\GetAuthorization;
use SwedbankPay\Api\Service\Invoice\Transaction\Request\GetCancellation;
use SwedbankPay\Api\Service\Invoice\Transaction\Request\GetCapture;
use SwedbankPay\Api\Service\Invoice\Transaction\Request\GetReversal;
use SwedbankPay\Api\Service\Invoice\Transaction\Request\GetTransaction;

/**
 * @SuppressWarnings(PHPMD.TooManyMethods)
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class InvoicePaymentTest extends TestCase
{

    public function testApiCredentials()
    {
        try {
            new Test(ACCESS_TOKEN, PAYEE_ID, true);
            $this->assertTrue(true);
        } catch (\Exception $e) {
            $this->assertTrue(true, $e->getMessage());
        }
    }

    /**
     * @return string
     * @throws ClientException
     */
    public function testInvoicePaymentRequest()
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

        $price = new PriceItem();
        $price->setType('Invoice')
            ->setAmount(1500)
            ->setVatAmount(0);

        $prices = new PricesCollection();
        $prices->addItem($price);

        $metadata = new Metadata();
        $metadata->setData('order_id', 'or-123456');

        $payment = new Payment();
        $payment->setOperation('FinancingConsumer')
            ->setIntent('Authorization')
            ->setCurrency('SEK')
            ->setDescription('Test Purchase')
            ->setUserAgent('Mozilla/5.0...')
            ->setLanguage('sv-SE')
            ->setUrls($url)
            ->setPayeeInfo($payeeInfo)
            ->setPrices($prices)
            ->setMetadata($metadata);

        $invoice = new Invoice();
        $invoice->setInvoiceType('PayExFinancingSe');

        $invoicePaymentObject = new InvoicePaymentObject();
        $invoicePaymentObject->setPayment($payment);
        $invoicePaymentObject->setInvoice($invoice);
        

        $invoiceRequest = new CreateInvoice($invoicePaymentObject);
        $invoiceRequest->setClient($this->client);

        /** @var ResponseServiceInterface $responseService */
        $responseService = $invoiceRequest->send();

        $this->assertInstanceOf(ResponseServiceInterface::class, $responseService);

        /** @var ResponseResourceInterface $response */
        $responseResource = $responseService->getResponseResource();

        $this->assertInstanceOf(ResponseResourceInterface::class, $responseResource);

        $result = $responseService->getResponseData();

        $this->assertIsArray($result);
        $this->assertArrayHasKey('payment', $result);
        $this->assertArrayHasKey('operations', $result);
        $this->assertEquals('FinancingConsumer', $result['payment']['operation']);
        $this->assertEquals('Invoice', $result['payment']['instrument']);

        return $result['payment']['id'];
    }

    /**
     * @depends SwedbankPayTest\Test\InvoicePaymentTest::testInvoicePaymentRequest
     * @param string $paymentId
     * @throws ClientException
     */
    public function testCreateApprovedLegalAddress($paymentId)
    {
        $addressee = new Addressee();
        $addressee->setSocialSecurityNumber('6003071161');
        $addressee->setZipCode('19792');

        $addresseeObject = new AddresseeObject();
        $addresseeObject->setAddressee($addressee);

        $addressRequest = new CreateApprovedLegalAddress($addresseeObject);
        $addressRequest->setClient($this->client);
        $addressRequest->setPaymentId($paymentId);

        /** @var ResponseServiceInterface $responseService */
        $responseService = $addressRequest->send();

        $this->assertInstanceOf(ResponseServiceInterface::class, $responseService);

        /** @var ResponseResourceInterface $response */
        $responseResource = $responseService->getResponseResource();

        $this->assertInstanceOf(ResponseResourceInterface::class, $responseResource);

        $result = $responseService->getResponseData();

        $this->assertIsArray($result);
        $this->assertArrayHasKey('payment', $result);
        $this->assertArrayHasKey('approved_legal_address', $result);
        $this->assertArrayHasKey('addressee', $result['approved_legal_address']);
    }

    /**
     * @depends SwedbankPayTest\Test\InvoicePaymentTest::testInvoicePaymentRequest
     * @param string $paymentId
     * @return array
     * @throws ClientException
     */
    public function testCreateAuthorizationTransaction($paymentId)
    {
        $transactionData = new Transaction();
        $transactionData->setActivity('FinancingConsumer');

        $consumerData = new Consumer();
        $consumerData->setSocialSecurityNumber('600307-1161')
                    ->setCustomerNumber('')
                    ->setName('Azra Oliveira')
                    ->setEmail('azra@example.com')
                    ->setMsisdn('+46760000000')
                    ->setIp('83.187.79.188');

        $legalAddressData = new ConsumerAddress();
        $legalAddressData->setAddressee('Azra Oliveira')
                        ->setStreetAddress('Jansson väg 12')
                        ->setZipCode('19792')
                        ->setCity('Bro')
                        ->setCountryCode('SE');

        $billingAddressData = new ConsumerAddress();
        $billingAddressData->setAddressee('Azra Oliveira')
            ->setStreetAddress('Jansson väg 12')
            ->setZipCode('19792')
            ->setCity('Bro')
            ->setCountryCode('SE');

        $transaction = new Authorization();
        $transaction->setTransaction($transactionData)
                    ->setConsumer($consumerData)
                    ->setLegalAddress($legalAddressData)
                    ->setBillingAddress($billingAddressData);

        $authorizationRequest = new CreateAuthorization($transaction);
        $authorizationRequest->setClient($this->client);
        $authorizationRequest->setPaymentId($paymentId);

        /** @var ResponseServiceInterface $responseService */
        $responseService = $authorizationRequest->send();

        $this->assertInstanceOf(ResponseServiceInterface::class, $responseService);

        /** @var ResponseResourceInterface $response */
        $responseResource = $responseService->getResponseResource();

        $this->assertInstanceOf(ResponseResourceInterface::class, $responseResource);

        $result = $responseService->getResponseData();

        $this->assertIsArray($result);
        $this->assertArrayHasKey('payment', $result);
        $this->assertArrayHasKey('authorization', $result);
        $this->assertArrayHasKey('transaction', $result['authorization']);
        $this->assertEquals('Authorization', $result['authorization']['transaction']['type']);

        return $result['authorization'];
    }

    /**
     * @depends SwedbankPayTest\Test\InvoicePaymentTest::testInvoicePaymentRequest
     * @param string $paymentId
     * @return array
     * @throws ClientException
     */
    public function testCapture($paymentId)
    {
        $transactionData = new TransactionCapture();
        $transactionData->setActivity('FinancingConsumer')
            ->setAmount(1)
            ->setVatAmount(0)
            ->setDescription('Test Capture')
            ->setPayeeReference($this->generateRandomString(12))
            ->setReceiptReference($this->generateRandomString(12))
            ->setItemDescriptions([
                [
                    'amount' => 1,
                    'description' => 'item description 1'
                ]
            ])
            ->setVatSummary([
                [
                    'amount' => 1,
                    'vatPercent' => 0,
                    'vatAmount' => 0
                ]
            ]);

        $transaction = new TransactionObject();
        $transaction->setTransaction($transactionData);

        $requestService = new CreateCapture($transaction);
        $requestService->setClient($this->client);
        $requestService->setPaymentId($paymentId);

        /** @var ResponseServiceInterface $responseService */
        $responseService = $requestService->send();
        $this->assertInstanceOf(ResponseServiceInterface::class, $responseService);

        /** @var CaptureObject $responseResource */
        $responseResource = $responseService->getResponseResource();
        $this->assertInstanceOf(CaptureObject::class, $responseResource);

        $result = $responseService->getResponseData();

        $this->assertIsArray($result);
        $this->assertArrayHasKey('payment', $result);
        $this->assertArrayHasKey('capture', $result);
        $this->assertArrayHasKey('transaction', $result['capture']);
        $this->assertEquals('Capture', $result['capture']['transaction']['type']);

        return $result['capture'];
    }

    /**
     * @depends SwedbankPayTest\Test\InvoicePaymentTest::testInvoicePaymentRequest
     * @depends SwedbankPayTest\Test\InvoicePaymentTest::testCapture
     * @param string $paymentId
     * @param array $capture
     * @return array
     * @throws ClientException
     */
    public function testReversal($paymentId, $capture)
    {
        $this->assertIsArray($capture);

        $transactionData = new TransactionReversal();
        $transactionData->setActivity('FinancingConsumer')
            ->setAmount(1)
            ->setVatAmount(0)
            ->setDescription('Test refund')
            ->setPayeeReference($this->generateRandomString(12))
            ->setReceiptReference($this->generateRandomString(12));

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
     * @depends SwedbankPayTest\Test\InvoicePaymentTest::testInvoicePaymentRequest
     * @param string $paymentId
     * @return array
     * @throws ClientException
     */
    public function testGetAuthorizations($paymentId)
    {
        $requestService = new GetAuthorizations();
        $requestService->setClient($this->client)
            ->setPaymentId($paymentId);

        /** @var ResponseServiceInterface $responseService */
        $responseService = $requestService->send();
        $this->assertInstanceOf(ResponseServiceInterface::class, $responseService);

        /** @var AuthorizationsObject $responseResource */
        $responseResource = $responseService->getResponseResource();
        $this->assertInstanceOf(AuthorizationsObject::class, $responseResource);

        $result = $responseService->getResponseData();

        $this->assertIsArray($result);
        $this->assertArrayHasKey('payment', $result);
        $this->assertArrayHasKey('authorizations', $result);
        $this->assertIsArray($result['authorizations']);

        return $result['authorizations'];
    }

    /**
     * @depends SwedbankPayTest\Test\InvoicePaymentTest::testGetAuthorizations
     * @param array $authorizations
     * @throws ClientException
     */
    public function testGetAuthorization($authorizations)
    {
        foreach ($authorizations['authorization_list'] as $authorization) {
            $requestService = new GetAuthorization();
            $requestService->setClient($this->client)
                ->setRequestEndpoint($authorization['id']);

            /** @var ResponseServiceInterface $responseService */
            $responseService = $requestService->send();
            $this->assertInstanceOf(ResponseServiceInterface::class, $responseService);

            /** @var AuthorizationObject $responseResource */
            $responseResource = $responseService->getResponseResource();
            $this->assertInstanceOf(AuthorizationObject::class, $responseResource);

            $result = $responseService->getResponseData();

            $this->assertIsArray($result);
            $this->assertArrayHasKey('payment', $result);
            $this->assertArrayHasKey('authorization', $result);
            $this->assertIsArray($result['authorization']);
            $this->assertArrayHasKey('id', $result['authorization']);

            // Test the first item only
            break;
        }
    }

    /**
     * @depends SwedbankPayTest\Test\InvoicePaymentTest::testInvoicePaymentRequest
     * @param string $paymentId
     * @return array
     * @throws ClientException
     */
    public function testGetCaptures($paymentId)
    {
        $requestService = new GetCaptures();
        $requestService->setClient($this->client)
            ->setPaymentId($paymentId);

        /** @var ResponseServiceInterface $responseService */
        $responseService = $requestService->send();
        $this->assertInstanceOf(ResponseServiceInterface::class, $responseService);

        /** @var CapturesObject $responseResource */
        $responseResource = $responseService->getResponseResource();
        $this->assertInstanceOf(CapturesObject::class, $responseResource);

        $result = $responseService->getResponseData();

        $this->assertIsArray($result);
        $this->assertArrayHasKey('payment', $result);
        $this->assertArrayHasKey('captures', $result);
        $this->assertIsArray($result['captures']);

        return $result['captures'];
    }

    /**
     * @depends SwedbankPayTest\Test\InvoicePaymentTest::testGetCaptures
     * @param array $capture
     * @throws ClientException
     */
    public function testGetCapture($capture)
    {
        foreach ($capture['capture_list'] as $sale) {
            $requestService = new GetCapture();
            $requestService->setClient($this->client)
                ->setRequestEndpoint($sale['id']);

            /** @var ResponseServiceInterface $responseService */
            $responseService = $requestService->send();
            $this->assertInstanceOf(ResponseServiceInterface::class, $responseService);

            /** @var CaptureObject $responseResource */
            $responseResource = $responseService->getResponseResource();
            $this->assertInstanceOf(CaptureObject::class, $responseResource);

            $result = $responseService->getResponseData();

            $this->assertIsArray($result);
            $this->assertArrayHasKey('payment', $result);
            $this->assertArrayHasKey('capture', $result);
            $this->assertIsArray($result['capture']);
            $this->assertArrayHasKey('id', $result['capture']);

            // Test the first item only
            break;
        }
    }

    /**
     * @depends SwedbankPayTest\Test\InvoicePaymentTest::testInvoicePaymentRequest
     * @param string $paymentId
     * @return array
     * @throws ClientException
     */
    public function testGetReversals($paymentId)
    {
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
     * @depends SwedbankPayTest\Test\InvoicePaymentTest::testGetReversals
     * @param array $reversals
     * @throws ClientException
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
     * @depends SwedbankPayTest\Test\InvoicePaymentTest::testInvoicePaymentRequest
     * @param string $paymentId
     * @return array
     * @throws ClientException
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
     * @depends SwedbankPayTest\Test\InvoicePaymentTest::testGetTransactions
     * @param array $transactions
     * @throws ClientException
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

    /**
     * @depends SwedbankPayTest\Test\InvoicePaymentTest::testInvoicePaymentRequest
     * @param string $paymentId
     * @return array
     * @throws ClientException
     */
    public function testGetCancellations($paymentId)
    {
        $this->expectException(ClientException::class);

        $requestService = new GetCancellations();
        $requestService->setClient($this->client)
            ->setPaymentId($paymentId);

        /** @var ResponseServiceInterface $responseService */
        $responseService = $requestService->send();
        $this->assertInstanceOf(ResponseServiceInterface::class, $responseService);

        /** @var CancellationsObject $responseResource */
        $responseResource = $responseService->getResponseResource();
        $this->assertInstanceOf(CancellationsObject::class, $responseResource);

        $result = $responseService->getResponseData();

        $this->assertIsArray($result);
        $this->assertArrayHasKey('payment', $result);
        $this->assertArrayHasKey('cancellations', $result);
        $this->assertIsArray($result['cancellations']);

        return $result['cancellations'];
    }

    /**
     * @depends SwedbankPayTest\Test\InvoicePaymentTest::testGetCancellations
     * @param array $cancellations
     * @throws ClientException
     */
    public function testGetCancellation($cancellations)
    {
        if (!$cancellations) {
            $this->assertEquals(null, $cancellations);
            return;
        }

        foreach ($cancellations['cancellation_list'] as $cancellation) {
            $requestService = new GetCancellation();
            $requestService->setClient($this->client)
                ->setRequestEndpoint($cancellation['id']);

            /** @var ResponseServiceInterface $responseService */
            $responseService = $requestService->send();
            $this->assertInstanceOf(ResponseServiceInterface::class, $responseService);

            /** @var CancellationObject $responseResource */
            $responseResource = $responseService->getResponseResource();
            $this->assertInstanceOf(CancellationObject::class, $responseResource);

            $result = $responseService->getResponseData();

            $this->assertIsArray($result);
            $this->assertArrayHasKey('payment', $result);
            $this->assertArrayHasKey('cancellation', $result);
            $this->assertIsArray($result['cancellation']);
            $this->assertArrayHasKey('id', $result['cancellation']);

            // Test the first item only
            break;
        }
    }
}
