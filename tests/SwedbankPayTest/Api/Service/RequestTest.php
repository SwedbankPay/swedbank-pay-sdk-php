<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service;

use TestCase;
use SwedbankPay\Api\Service\Data\RequestInterface;
use SwedbankPay\Api\Service\Data\ResourceInterface;
use SwedbankPay\Api\Service\Request;
use SwedbankPay\Api\Service\Consumer\Resource\ConsumerNationalIdentifier;
use SwedbankPay\Api\Service\Consumer\Resource\Request\InitiateConsumerSession;
use SwedbankPay\Api\Client\Exception;

class RequestTest extends TestCase
{
    public function testData()
    {
        $request = new Request();
        $this->assertInstanceOf(RequestInterface::class, $request);

        $request->setClient($this->client);
        $this->assertInstanceOf(get_class($this->client), $request->getClient());

        $result = $request->setRequestMethod('POST');
        $this->assertInstanceOf(RequestInterface::class, $result);
        $result = $request->getRequestMethod();
        $this->assertEquals('POST', $result);

        $result = $request->setRequestEndpoint('/');
        $this->assertInstanceOf(RequestInterface::class, $result);
        $result = $request->getRequestEndpoint();
        $this->assertEquals('/', $result);

        // setRequestEndpointVars

        $result = $request->setServiceOperation('TEST');
        $this->assertInstanceOf(RequestInterface::class, $result);
        $result = $request->getServiceOperation();
        $this->assertEquals('TEST', $result);

        $result = $request->setRequestResource(new ConsumerNationalIdentifier());
        $this->assertInstanceOf(RequestInterface::class, $result);
        $result = $request->getRequestResource();
        $this->assertInstanceOf(ResourceInterface::class, $result);

        $result = $request->setResponseResourceFQCN('TEST');
        $this->assertInstanceOf(RequestInterface::class, $result);
        $result = $request->getResponseResourceFQCN();
        $this->assertEquals('TEST', $result);

        $result = $request->setPaymentId('TEST');
        $this->assertInstanceOf(RequestInterface::class, $result);
        $result = $request->getPaymentId();
        $this->assertEquals('TEST', $result);

        $result = $request->setPaymentOrderId('TEST');
        $this->assertInstanceOf(RequestInterface::class, $result);
        $result = $request->getPaymentOrderId();
        $this->assertEquals('TEST', $result);

        $result = $request->setOperationRel('TEST');
        $this->assertInstanceOf(RequestInterface::class, $result);
        $result = $request->getOperationRel();
        $this->assertEquals('TEST', $result);

        $result = $request->setExpands([]);
        $this->assertInstanceOf(RequestInterface::class, $result);
        $result = $request->getExpands();
        $this->assertIsArray($result);

        $request->setRequestResource((new InitiateConsumerSession())->setConsumerCountryCode('SE'));
        $result = $request->getRequestData();
        $this->assertIsArray($result);
    }

    public function testSend()
    {
        $params = [
            'payment' => [
                'operation' => 'Test',
                'payeeInfo' => [
                    'payeeId' => PAYEE_ID
                ]
            ],
        ];

        $request = new Request();
        $request->setClient($this->client);
        $request->setRequestMethod('POST');
        $request->setRequestEndpoint('/psp/creditcard/payments');
        $request->setRequestEndpointVars($params);

        try {
            $request->send();
        } catch (Exception $e) {
            $this->assertNotNull($e->getCode());
            $this->assertNotNull($this->client->getResponseCode());
            $this->assertNotNull($this->client->getResponseBody());
            $this->assertNotNull($this->client->getDebugInfo());
        }
    }
}