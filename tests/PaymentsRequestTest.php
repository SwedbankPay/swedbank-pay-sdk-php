<?php

use PayEx\Api\Service\Paymentorder\Request\GetPayments;

use PayEx\Api\Service\Data\ResponseInterface as ResponseServiceInterface;
use PayEx\Api\Service\Paymentorder\Resource\Response\Data\GetPaymentsInterface as GetPaymentsResponseResourceInterface;

class PaymentsRequestTest extends TestCase
{
    protected $paymentsRequest;

    /**
     * @throws \PayEx\Api\Client\Exception
     */
    public function testPaymentsRequest()
    {
        $paymentId = $this->getPaymentOrderId();

        $this->paymentsRequest = new GetPayments();
        $this->paymentsRequest->setRequestEndpoint($paymentId)
            ->setClient($this->client);

        /** @var ResponseServiceInterface $responseService */
        $responseService = $this->paymentsRequest->send();

        $this->assertInstanceOf(ResponseServiceInterface::class, $responseService);

        /** @var GetPaymentsResponseResourceInterface $response */
        $responseResource = $responseService->getResponseResource();

        $this->assertInstanceOf(GetPaymentsResponseResourceInterface::class, $responseResource);

        $result = $responseService->getResponseData();

        $this->assertTrue(is_array($result));
        $this->assertTrue(isset($result['payment_order']));
    }
}
