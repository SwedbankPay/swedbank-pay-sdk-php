<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service;

use TestCase;
use SwedbankPay\Api\Service\Data\ResponseInterface;
use SwedbankPay\Api\Service\Request;
use SwedbankPay\Api\Service\Resource\Data\ResponseInterface as ResponseResourceInterface;
use SwedbankPay\Api\Service\Response;
use SwedbankPay\Api\Service\Consumer\Request\GetBillingDetails;
use SwedbankPay\Api\Service\Consumer\Resource\Response\GetBillingDetails as GetBillingDetailsResponseResource;

class ResponseTest extends TestCase
{
    public function testResponse()
    {
        $response = new Response(new GetBillingDetails());
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertInstanceOf(Request::class, $response->getRequestService());

        $response->setRequestService(new GetBillingDetails());
        $this->assertInstanceOf(GetBillingDetails::class, $response->getRequestService());

        $response->setResponseResource(new GetBillingDetailsResponseResource());
        $this->assertInstanceOf(ResponseResourceInterface::class, $response->getResponseResource());

        $this->assertIsArray($response->getResponseData());

        $this->assertEquals(false, $response->getOperationByRel('invalid'));
    }
}