<?php

namespace SwedbankPay\Test\Unit;

use PHPUnit\Framework\TestCase;
use SwedbankPay\Api\Client\Exception;
use SwedbankPay\Api\Service\Request;

class RequestTest extends TestCase
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        $this->request = new Request();
    }

    /**
     * @param string|null $requestEndpoint
     * @param string|null $paymentId
     * @param string|null $paymentOrderId
     * @param array $expands
     * @param string $expectedEndpoint
     * @dataProvider requestEndpointProvider
     */
    public function testBuildRequestEndpointReturnsExpectedEndpoint(
        ?string $requestEndpoint,
        ?string $paymentId,
        ?string $paymentOrderId,
        array $expands,
        string $expectedEndpoint
    ) {
        $this->request
            ->setRequestEndpoint($requestEndpoint)
            ->setPaymentId($paymentId)
            ->setPaymentOrderId($paymentOrderId)
            ->setExpands($expands);

        $this->assertEquals($expectedEndpoint, $this->request->buildRequestEndpoint());
    }

    /**
     * @return array
     */
    public function requestEndpointProvider()
    {
        return [
            'test with defined request endpoint and payment ID' => [
                '/psp/creditcard/payments/0dac01c4-3c2e-4f32-31d2-08d8df0d48aa/captures',
                '/psp/creditcard/payments/0dac01c4-3c2e-4f32-31d2-08d8df0d48aa',
                null,
                [],
                '/psp/creditcard/payments/0dac01c4-3c2e-4f32-31d2-08d8df0d48aa/captures'
            ],
            'test with only defined payment ID' => [
                null,
                '/psp/creditcard/payments/0dac01c4-3c2e-4f32-31d2-08d8df0d48aa',
                null,
                [],
                '/psp/creditcard/payments/0dac01c4-3c2e-4f32-31d2-08d8df0d48aa'
            ],
            'test with only defined payment Order ID' => [
                null,
                null,
                '/psp/paymentorders/0dac01c4-3c2e-4f32-31d2-08d8df0d48aa',
                [],
                '/psp/paymentorders/0dac01c4-3c2e-4f32-31d2-08d8df0d48aa'
            ],
            'test with defined payment ID and Payment Order ID' => [
                null,
                '/psp/creditcard/payments/0dac01c4-3c2e-4f32-31d2-08d8df0d48aa',
                '/psp/paymentorders/0dac01c4-3c2e-4f32-31d2-08d8df0d48aa',
                [],
                '/psp/creditcard/payments/0dac01c4-3c2e-4f32-31d2-08d8df0d48aa'
            ],
            'test with defined expands array' => [
                '/psp/creditcard/payments/0dac01c4-3c2e-4f32-31d2-08d8df0d48aa',
                '/psp/creditcard/payments/0dac01c4-3c2e-4f32-31d2-08d8df0d48aa',
                null,
                ['transactions'],
                '/psp/creditcard/payments/0dac01c4-3c2e-4f32-31d2-08d8df0d48aa?$expand=transactions'
            ]
        ];
    }
}
