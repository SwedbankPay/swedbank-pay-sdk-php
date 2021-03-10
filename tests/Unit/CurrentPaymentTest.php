<?php

namespace SwedbankPay\Test\Unit;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use SwedbankPay\Api\Client\Client;
use SwedbankPay\Api\Client\Exception;
use SwedbankPay\Api\Service\Data\ResponseInterface;
use SwedbankPay\Api\Service\Payment\Resource\Response\Data\PaymentObjectInterface;
use SwedbankPay\Api\Service\Payment\Transaction\Resource\Response\Data\TransactionInterface;
use SwedbankPay\Api\Service\Request;
use SwedbankPay\Test\Unit\Helper\SampleResponseHelper;

class CurrentPaymentTest extends TestCase
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
     * @var SampleResponseHelper
     */
    protected $sampleResponseHelper;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        $this->client = $this->getMockBuilder(Client::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->client->expects($this->atLeastOnce())->method('getAccessToken')->willReturn('test-access-token');
        $this->client->expects($this->atLeastOnce())->method('getPayeeId')->willReturn('test-payee-id');
        $this->client->expects($this->atLeastOnce())->method('request')->willReturnSelf();

        $this->request = new Request();
        $this->sampleResponseHelper = new SampleResponseHelper();
    }

    /**
     * @param string $paymentRequestClass
     * @dataProvider currentPaymentClassProvider
     * @throws Exception
     */
    public function testGetPayment(string $paymentRequestClass)
    {
        $responseJson = $this->sampleResponseHelper->getSampleResponse('samplePaymentResponse.json');

        $this->client->expects($this->atLeastOnce())->method('getResponseBody')->willReturn($responseJson);

        /** @var Request $request */
        $request = new $paymentRequestClass();
        $request->setClient($this->client);

        $response = $request->send();

        /** @var PaymentObjectInterface $currentPayment */
        $currentPayment = $response->getResponseResource();

        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertInstanceOf(PaymentObjectInterface::class, $currentPayment);

        $this->assertNotNull($currentPayment->getPayment());
        $this->assertNotNull($currentPayment->getPayment()->getTransactions());
        $this->assertNotNull($currentPayment->getPayment()->getTransactions()->getId());

        $this->assertNull($currentPayment->getPayment()->getTransactions()->getTransactionList());

//        var_dump($response->getResponseResource()->getPayment());
    }

    /**
     * @param string $paymentRequestClass
     * @dataProvider currentPaymentClassProvider
     * @throws Exception
     */
    public function testGetPaymentWithTransactionExpanded(string $paymentRequestClass)
    {
        $responseJson = $this->sampleResponseHelper->getSampleResponse('samplePaymentWithTransactionResponse.json');

        $this->client->expects($this->atLeastOnce())->method('getResponseBody')->willReturn($responseJson);

        /** @var Request $request */
        $request = new $paymentRequestClass();
        $request->setClient($this->client);

        $response = $request->send();

        /** @var PaymentObjectInterface $currentPayment */
        $currentPayment = $response->getResponseResource();

        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertInstanceOf(PaymentObjectInterface::class, $currentPayment);

        $this->assertNotNull($currentPayment->getPayment());
        $this->assertNotNull($currentPayment->getPayment()->getTransactions());
        $this->assertNotNull($currentPayment->getPayment()->getTransactions()->getId());

        $transactionList = $currentPayment->getPayment()->getTransactions()->getTransactionList();

        /** @var TransactionInterface[] $transactionListItems */
        $transactionListItems = $transactionList->getItems();

        $this->assertNotNull($transactionList);
        $this->assertIsArray($transactionListItems);
        $this->assertInstanceOf(TransactionInterface::class, $transactionListItems[0]);
        $this->assertNotNull($transactionListItems[0]->getNumber());
    }

    /**
     * @return array
     */
    public function currentPaymentClassProvider()
    {
        return [
            'test current payment request for credit card' => [
                'SwedbankPay\Api\Service\Creditcard\Request\GetPayment'
            ],
            'test current payment request for swish' => [
                'SwedbankPay\Api\Service\Swish\Request\GetPayment'
            ],
            'test current payment request for vipps' => [
                'SwedbankPay\Api\Service\Vipps\Request\GetPayment'
            ],
            'test current payment request for invoice' => [
                'SwedbankPay\Api\Service\Invoice\Request\GetPayment'
            ]
        ];
    }
}
