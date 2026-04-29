<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Paymentorder\V3\Request;

use PHPUnit\Framework\MockObject\MockObject;
use SwedbankPay\Api\Client\Client;
use SwedbankPay\Api\Client\Exception;
use SwedbankPay\Api\Service\Data\ResponseInterface;
use SwedbankPay\Api\Service\Paymentorder\V3\Request\GetPaymentorder;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Collection\Item\FinancialTransaction;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\PaymentOrder;
use SwedbankPay\Api\Service\Paymentorder\V3\Resource\Response\PaymentorderResponse;
use SwedbankPay\Api\Service\Request;
use TestCase;

class GetPaymentorderTest extends TestCase
{
    /**
     * @var Client|MockObject
     */
    protected $client;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @throws Exception
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->client = $this->getMockBuilder(Client::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->request = new Request();
    }

    /**
     * Configure the mock Client to return $responseJson when send() is invoked. Mirrors
     * the existing GetPaymentTest pattern for asserting on a typed response resource.
     */
    private function primeClientForSend(string $responseJson): void
    {
        $this->client->expects($this->atLeastOnce())->method('getAccessToken')->willReturn('test-access-token');
        $this->client->expects($this->atLeastOnce())->method('getPayeeId')->willReturn('test-payee-id');
        $this->client->expects($this->atLeastOnce())->method('request')->willReturnSelf();
        $this->client->expects($this->atLeastOnce())->method('getResponseBody')->willReturn($responseJson);
    }

    /**
     * @param string|null $fileName
     * @return string
     */
    private function getSampleResponse(string $fileName = null): string
    {
        $fileName = $fileName ?? 'samplePurchaseResponseV3.json';

        return file_get_contents(__DIR__ . '/' . $fileName);
    }

    /**
     * @throws Exception
     */
    public function testData()
    {
        $object = new GetPaymentorder();
        $object->setClient($this->client);
        $this->assertTrue(method_exists($object, 'setup'));
        $this->assertNull($object->setup());

        $this->assertEquals('GET', $object->getRequestMethod());
        $this->assertEquals(PaymentorderResponse::class, $object->getResponseResourceFQCN());
    }

    /**
     * @throws Exception
     */
    public function testGetPaymentorder()
    {
        $responseJson = $this->getSampleResponse('samplePurchaseResponseV3.json');

        $this->primeClientForSend($responseJson);

        $request = new GetPaymentorder();
        $request->setClient($this->client);

        $response = $request->send();

        /** @var PaymentorderResponse $resource */
        $resource = $response->getResponseResource();

        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertInstanceOf(PaymentorderResponse::class, $resource);
        $this->assertInstanceOf(PaymentOrder::class, $resource->getPaymentOrder());

        $paymentOrder = $resource->getPaymentOrder();
        $this->assertEquals('Initialized', $paymentOrder->getStatus());
        $this->assertEquals('Purchase', $paymentOrder->getOperation());
        $this->assertEquals(100, $paymentOrder->getAmount());
        $this->assertEquals('SEK', $paymentOrder->getCurrency());
        $this->assertEquals(['CreditCard', 'Invoice-PayExFinancingSe', 'Swish', 'Trustly', 'MobilePay'], $paymentOrder->getAvailableInstruments());

        // Sub-resources arrive as link stubs unless `?$expand=` was used.
        $this->assertNotNull($paymentOrder->getPaid());
        $this->assertNotNull($paymentOrder->getPaid()->getId());
        $this->assertNull($paymentOrder->getPaid()->getNumber());

        $this->assertNull($resource->getLatestFinancialTransaction());
    }

    /**
     * @throws Exception
     */
    public function testGetPaymentorderWithFinancialTransactionsExpanded()
    {
        $responseJson = $this->getSampleResponse('sampleCaptureResponseV3.json');

        $this->primeClientForSend($responseJson);

        $request = new GetPaymentorder();
        $request->setClient($this->client);

        $response = $request->send();

        /** @var PaymentorderResponse $resource */
        $resource = $response->getResponseResource();

        $this->assertInstanceOf(PaymentorderResponse::class, $resource);
        $this->assertEquals('Paid', $resource->getPaymentOrder()->getStatus());

        // When `paid` is expanded, instrument and tokens become accessible via typed getters.
        $paid = $resource->getPaymentOrder()->getPaid();
        $this->assertNotNull($paid);
        $this->assertEquals('CreditCard', $paid->getInstrument());
        $this->assertEquals(100, $paid->getAmount());
        $this->assertEquals('6e7f3a0b-3d4d-46a7-8d13-6b15180896a2', $paid->getNonPaymentToken());

        // Latest financial transaction convenience walks the expanded list.
        $latest = $resource->getLatestFinancialTransaction();
        $this->assertInstanceOf(FinancialTransaction::class, $latest);
        $this->assertEquals('Capture', $latest->getType());
        $this->assertEquals(40128372069, $latest->getNumber());
    }
}
