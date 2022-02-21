<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Service;

use TestCase;
use SwedbankPay\Api\Service\ResourceFactory;
use SwedbankPay\Api\Service\Payment\Resource\Response\PaymentObject;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\Data\PaymentUrlInterface;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentUrl;
use SwedbankPay\Api\Service\Resource\Request;
use SwedbankPay\Api\Service\Resource\Response;

class ResourceFactoryTest extends TestCase
{
    public function testFindFileByNamespace()
    {
        $factory = new ResourceFactory();
        $reflection = new \ReflectionClass($factory);
        $method = $reflection->getMethod('findFileByNamespace');
        $method->setAccessible(true);
        $result = $method->invoke($factory, PaymentObject::class);
        $this->assertTrue($result);
    }

    public function testData()
    {
        $factory = new ResourceFactory();
        $this->assertInstanceOf(ResourceFactory::class, $factory);

        /** @var PaymentUrlInterface $responseResource */
        $responseResource = $factory->createFromFqcn(
            'Response',
            PaymentUrl::class,
            [
                PaymentUrlInterface::COMPLETE_URL => 'https://example.com'
            ]
        );

        $this->assertInstanceOf(PaymentUrlInterface::class, $responseResource);
        $this->assertInstanceOf(PaymentUrl::class, $responseResource);
        $this->assertEquals('https://example.com', $responseResource->getCompleteUrl());
    }

    public function testNewRequestResource()
    {
        $factory = new ResourceFactory();

        /** @var Request $result */
        $result = $factory->newRequestResource();
        $this->assertInstanceOf(Request::class, $result);
    }

    public function testNewResponseResource()
    {
        $factory = new ResourceFactory();

        /** @var Resource $result */
        $result = $factory->newResponseResource();
        $this->assertInstanceOf(Response::class, $result);
    }

    public function testCreate()
    {
        $factory = new ResourceFactory();

        /** @var Request $result */
        $result = $factory->create('', '', 'request');
        $this->assertInstanceOf(Request::class, $result);
    }
}