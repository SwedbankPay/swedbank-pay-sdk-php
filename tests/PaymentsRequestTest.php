<?php

use SwedbankPay\Api\Service\Paymentorder\Request\GetPayments;

use SwedbankPay\Api\Service\Data\ResponseInterface as ResponseServiceInterface;
use SwedbankPay\Api\Service\Paymentorder\Resource\Response\Data\GetPaymentsInterface
    as GetPaymentsResponseResourceInterface;

class PaymentsRequestTest extends TestCase
{
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
