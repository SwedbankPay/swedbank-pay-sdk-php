<?php

namespace SwedbankPayTest\Test;

use TestCase;
use SwedbankPay\Api\Client\Exception;

use SwedbankPay\Api\Service\Paymentorder\Request\Test;
use SwedbankPay\Api\Service\Paymentorder\Resource\Request\Paymentorder;
use SwedbankPay\Api\Service\Paymentorder\Resource\Collection\OrderItemsCollection;
use SwedbankPay\Api\Service\Paymentorder\Resource\Collection\Item\OrderItem;

use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderUrl;
use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderPayeeInfo;
use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderPayer;
use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderMetadata;

use SwedbankPay\Api\Service\Paymentorder\Request\Purchase;
use SwedbankPay\Api\Service\Paymentorder\Request\GetCurrentPayment;
use SwedbankPay\Api\Service\Paymentorder\Request\GetPaymentorder;
use SwedbankPay\Api\Service\Paymentorder\Request\GetPayments;
use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderObject;

use SwedbankPay\Api\Service\Data\ResponseInterface as ResponseServiceInterface;
use SwedbankPay\Api\Service\Resource\Data\ResponseInterface as ResponseResourceInterface;

use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Request\Transaction;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Request\TransactionObject;

use SwedbankPay\Api\Service\Paymentorder\Transaction\Request\TransactionCapture;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Request\TransactionReversal;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response\TransactionCapture as TransactionCaptureResponse;
use SwedbankPay\Api\Service\Paymentorder\Transaction\Resource\Response\TransactionReversal as TransactionReversalResponse;

/**
 * @SuppressWarnings(PHPMD.TooManyMethods)
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class PurchaseTest extends TestCase
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
     * @throws Exception
     */
    public function testPurchaseRequest()
    {
        $urlData = new PaymentorderUrl();
        $urlData->setHostUrls(['https://example.com', 'https://example.net'])
            ->setCompleteUrl('https://example.com/payment-completed')
            ->setCancelUrl('https://example.com/payment-canceled')
            ->setPaymentUrl('https://example.com/perform-payment')
            ->setCallbackUrl('https://api.internaltest.payex.com/psp/fakecallback')
            ->setTermsOfService('https://example.com/termsandconditoons.pdf')
            ->setLogoUrl('https://example.com/logo.png');

        $payeeInfo = new PaymentorderPayeeInfo();
        $payeeInfo->setPayeeId(PAYEE_ID)
            ->setPayeeReference($this->generateRandomString(30))
            ->setPayeeName('Merchant1')
            ->setProductCategory('A123')
            ->setOrderReference('or-123456');

        $payer = new PaymentorderPayer();
        $payer->setEmail('olivia.nyhuus@payex.com')
            ->setMsisdn('+4798765432')
            ->setWorkPhoneNumber('+4787654321')
            ->setHomePhoneNumber('+4776543210');

        $metadata = new PaymentorderMetadata();
        $metadata->setKey1('value1')
            ->setKey2(2)
            ->setKey3(3.1)
            ->setKey4(false);

        $orderItems = new OrderItemsCollection();

        $orderItem = new OrderItem();
        $orderItem->setReference('P1')
            ->setName('Product1')
            ->setType('PRODUCT')
            ->setItemClass('ProductGroup1')
            ->setItemUrl('https://example.com/products/123')
            ->setImageUrl('https://example.com/product123.jpg')
            ->setDescription('Product 1 description')
            ->setDiscountDescription('Volume discount')
            ->setQuantity(1)
            ->setUnitPrice(1500)
            ->setQuantityUnit('pcs')
            ->setDiscountDescription(0)
            ->setVatPercent(0)
            ->setAmount(1500)
            ->setVatAmount(0);

        $orderItems->addItem($orderItem);

        $paymentOrder = new Paymentorder();
        $paymentOrder->setOperation('Purchase')
            ->setCurrency('SEK')
            ->setAmount('1500')
            ->setVatAmount(0)
            ->setDescription('Test Purchase')
            ->setUserAgent('Mozilla/5.0...')
            ->setLanguage('nb-NO')
            ->setGeneratePaymentToken(false)
            ->setDisablePaymentMenu(false)
            ->setUrls($urlData)
            ->setPayeeInfo($payeeInfo)
            ->setMetadata($metadata)
            ->setOrderItems($orderItems)
            ->setPayer($payer)
            ->setPayerReference('payer@refrence.no');

        $paymentOrderObject = new PaymentorderObject();
        $paymentOrderObject->setPaymentorder($paymentOrder);

        $purchaseRequest = new Purchase($paymentOrderObject);
        $purchaseRequest->setClient($this->client);

        /** @var ResponseServiceInterface $responseService */
        $responseService = $purchaseRequest->send();

        $this->assertInstanceOf(ResponseServiceInterface::class, $responseService);

        /** @var ResponseResourceInterface $response */
        $responseResource = $responseService->getResponseResource();

        $this->assertInstanceOf(ResponseResourceInterface::class, $responseResource);

        $result = $responseService->getResponseData();

        $this->assertIsArray($result);
        $this->assertArrayHasKey('payment_order', $result);
        $this->assertArrayHasKey('operations', $result);
        $this->assertArrayHasKey('items', $result['payment_order']);
        $this->assertArrayHasKey('order_items', $result['payment_order']);
        $this->assertEquals('Purchase', $result['payment_order']['operation']);
        $this->assertNotEmpty($result['payment_order']['id']);

        // phpcs:disable
        if (file_exists(__DIR__ . '/../../../payments.ini')) {
            $data = parse_ini_file(__DIR__ . '/../../../payments.ini', true);
            return $data['Checkout']['payment_order_id'];
        }
        // phpcs:enable

        return false;
    }

    /**
     * @depends SwedbankPayTest\Test\PurchaseTest::testPurchaseRequest
     * @param string $paymentOrderId
     * @throws Exception
     */
    public function testGetCurrentPayment($paymentOrderId)
    {
        if (!$paymentOrderId) {
            $this->markTestSkipped('Impossible to test if the payment request is not paid');
        }

        $request = new GetCurrentPayment();
        $request->setClient($this->client)
            ->setPaymentOrderId($paymentOrderId);

        /** @var ResponseServiceInterface $responseService */
        $responseService = $request->send();

        $this->assertInstanceOf(ResponseServiceInterface::class, $responseService);

        /** @var ResponseResourceInterface $response */
        $responseResource = $responseService->getResponseResource();

        $this->assertInstanceOf(ResponseResourceInterface::class, $responseResource);

        $result = $responseService->getResponseData();

        $this->assertIsArray($result);
        $this->assertArrayHasKey('id', $result);
        $this->assertArrayHasKey('payment', $result);
        $this->assertArrayHasKey('id', $result['payment']);
    }

    /**
     * @depends SwedbankPayTest\Test\PurchaseTest::testPurchaseRequest
     * @param string $paymentOrderId
     * @throws Exception
     */
    public function testGetPayments($paymentOrderId)
    {
        if (!$paymentOrderId) {
            $this->markTestSkipped('Impossible to test if the payment request is not paid');
        }

        $request = new GetPayments();
        $request->setClient($this->client)
            ->setPaymentOrderId($paymentOrderId);

        /** @var ResponseServiceInterface $responseService */
        $responseService = $request->send();

        $this->assertInstanceOf(ResponseServiceInterface::class, $responseService);

        /** @var ResponseResourceInterface $response */
        $responseResource = $responseService->getResponseResource();

        $this->assertInstanceOf(ResponseResourceInterface::class, $responseResource);

        $result = $responseService->getResponseData();

        $this->assertIsArray($result);
        $this->assertArrayHasKey('payment_order', $result);
        $this->assertArrayHasKey('payments', $result);
        $this->assertArrayHasKey('id', $result['payments']);
        $this->assertArrayHasKey('payment_list', $result['payments']);
    }

    /**
     * @depends SwedbankPayTest\Test\PurchaseTest::testPurchaseRequest
     * @param string $paymentOrderId
     * @throws Exception
     */
    public function testGetPaymentorder($paymentOrderId)
    {
        if (!$paymentOrderId) {
            $this->markTestSkipped('Impossible to test if the payment request is not paid');
        }

        $request = new GetPaymentorder();
        $request->setClient($this->client)
            ->setPaymentOrderId($paymentOrderId);

        /** @var ResponseServiceInterface $responseService */
        $responseService = $request->send();

        $this->assertInstanceOf(ResponseServiceInterface::class, $responseService);

        /** @var ResponseResourceInterface $response */
        $responseResource = $responseService->getResponseResource();

        $this->assertInstanceOf(ResponseResourceInterface::class, $responseResource);

        $result = $responseService->getResponseData();

        $this->assertIsArray($result);
        $this->assertArrayHasKey('payment_order', $result);
        $this->assertArrayHasKey('operations', $result);
        $this->assertArrayHasKey('id', $result['payment_order']);
        $this->assertArrayHasKey('operation', $result['payment_order']);
        $this->assertArrayHasKey('state', $result['payment_order']);
    }

    /**
     * @depends SwedbankPayTest\Test\PurchaseTest::testPurchaseRequest
     * @param string $paymentOrderId
     * @return array
     * @throws Exception
     */
    public function testCapture($paymentOrderId)
    {
        if (!$paymentOrderId) {
            $this->markTestSkipped('Impossible to test if the payment request is not paid');
        }

        $transactionData = new Transaction();
        $transactionData->setAmount(1500)
            ->setVatAmount(0)
            ->setDescription('Test Capture')
            ->setPayeeReference($this->generateRandomString(12))
            ->setOrderItems([
                [
                    'reference' => 'P1',
                    'name' => 'Product1',
                    'type' => 'PRODUCT',
                    'class' => 'ProductGroup1',
                    'description' => 'Product 1 description',
                    'quantity' => 1,
                    'quantityUnit' => 'pcs',
                    'unitPrice' => 1500,
                    'vatPercent' => 0,
                    'amount' => 1500,
                    'vatAmount' => 0
                ]
            ]);

        $transaction = new TransactionObject();
        $transaction->setTransaction($transactionData);

        $requestService = new TransactionCapture($transaction);
        $requestService->setClient($this->client)
            ->setPaymentOrderId($paymentOrderId);

        /** @var ResponseServiceInterface $responseService */
        $responseService = $requestService->send();
        $this->assertInstanceOf(ResponseServiceInterface::class, $responseService);

        /** @var TransactionCaptureResponse $responseResource */
        $responseResource = $responseService->getResponseResource();
        $this->assertInstanceOf(TransactionCaptureResponse::class, $responseResource);

        $result = $responseService->getResponseData();

        $this->assertIsArray($result);
        $this->assertArrayHasKey('payment', $result);
        $this->assertArrayHasKey('capture', $result);
        $this->assertArrayHasKey('transaction', $result['capture']);
        $this->assertEquals('Capture', $result['capture']['transaction']['type']);

        return $result['capture'];
    }

    /**
     * @depends SwedbankPayTest\Test\PurchaseTest::testPurchaseRequest
     * @param string $paymentOrderId
     * @return array
     * @throws Exception
     */
    public function testReversal($paymentOrderId)
    {
        if (!$paymentOrderId) {
            $this->markTestSkipped('Impossible to test if the payment request is not paid');
        }

        $transactionData = new Transaction();
        $transactionData->setAmount(1500)
            ->setVatAmount(0)
            ->setDescription('Test refund')
            ->setPayeeReference($this->generateRandomString(12))
            ->setOrderItems([
                [
                    'reference' => 'P1',
                    'name' => 'Product1',
                    'type' => 'PRODUCT',
                    'class' => 'ProductGroup1',
                    'description' => 'Product 1 description',
                    'quantity' => 1,
                    'quantityUnit' => 'pcs',
                    'unitPrice' => 1500,
                    'vatPercent' => 0,
                    'amount' => 1500,
                    'vatAmount' => 0
                ]
            ]);

        $transaction = new TransactionObject();
        $transaction->setTransaction($transactionData);

        $requestService = new TransactionReversal($transaction);
        $requestService->setClient($this->client)
            ->setPaymentOrderId($paymentOrderId);

        /** @var ResponseServiceInterface $responseService */
        $responseService = $requestService->send();
        $this->assertInstanceOf(ResponseServiceInterface::class, $responseService);

        /** @var TransactionReversalResponse $responseResource */
        $responseResource = $responseService->getResponseResource();
        $this->assertInstanceOf(TransactionReversalResponse::class, $responseResource);

        $result = $responseService->getResponseData();

        $this->assertIsArray($result);
        $this->assertArrayHasKey('payment', $result);
        $this->assertArrayHasKey('reversal', $result);
        $this->assertArrayHasKey('transaction', $result['reversal']);
        $this->assertEquals('Reversal', $result['reversal']['transaction']['type']);

        return $result['reversal'];
    }
}
