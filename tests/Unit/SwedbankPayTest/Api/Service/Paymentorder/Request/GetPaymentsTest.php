<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service\Paymentorder\Request;

use TestCase;
use SwedbankPay\Api\Service\Paymentorder\Request\GetPayments;
use SwedbankPay\Api\Service\Data\ResponseInterface as ResponseServiceInterface;
use SwedbankPay\Api\Service\Paymentorder\Resource\Response\Data\GetPaymentsInterface
    as GetPaymentsResponseResourceInterface;

class GetPaymentsTest extends TestCase
{
    public function testData()
    {
        $object = new GetPayments();
        $object->setClient($this->client);
        $this->assertTrue(method_exists($object, 'setup'));
        $this->assertNull($object->setup());

        $this->assertNotNull($object->getRequestMethod());
        $this->assertNotNull($object->getOperationRel());
    }

    /**
     * @throws \SwedbankPay\Api\Client\Exception
     */
    public function testPaymentsRequest()
    {
        $paymentId = $this->getPaymentOrderId();

        $paymentsRequest = new GetPayments();
        $paymentsRequest->setRequestEndpoint($paymentId)
            ->setClient($this->client);

        /** @var ResponseServiceInterface $responseService */
        $responseService = $paymentsRequest->send();

        $this->assertInstanceOf(ResponseServiceInterface::class, $responseService);

        /** @var GetPaymentsResponseResourceInterface $response */
        $responseResource = $responseService->getResponseResource();

        $this->assertInstanceOf(GetPaymentsResponseResourceInterface::class, $responseResource);

        $result = $responseService->getResponseData();

        $this->assertIsArray($result);
        $this->assertArrayHasKey('payment_order', $result);
    }
}
