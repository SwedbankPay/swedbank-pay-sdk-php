<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api\Client;

use TestCase;
use SwedbankPay\Api\Client\Exception as ClientException;

class ClientTest extends TestCase
{
    public function testMode()
    {
        $client = $this->client->setMode($this->client::MODE_PRODUCTION);
        $baseUrl = $client->offsetGet($this->client::BASE_URL);
        $this->assertEquals($this->client::MODE_PRODUCTION_URL, $baseUrl);
    }

    public function testHeaders()
    {
        $client = $this->client->setHeaders(['X-Powered-By: Swedbank Pay']);
        $headers = $client->offsetGet($client::HEADERS);
        $this->assertContains('X-Powered-By: Swedbank Pay', $headers);
    }

    public function testGetSystemCaRootBundlePath()
    {
        $path = $this->client::getSystemCaRootBundlePath();
        $this->assertNotNull($path);
    }

    public function testRequest()
    {
        $params = [
            'payment' => [
                'operation' => 'Test',
                'payeeInfo' => [
                    'payeeId' => PAYEE_ID
                ]
            ],
        ];

        try {
            /** @var \SwedbankPay\Api\Response $response */
            $this->client->request(
                'POST',
                '/psp/creditcard/payments',
                $params
            );
        } catch (ClientException $e) {
            $this->assertNotNull($e->getCode());
            $this->assertNotNull($this->client->getResponseCode());
            $this->assertNotNull($this->client->getResponseBody());
            $this->assertNotNull($this->client->getDebugInfo());
        }
    }

    public function testPost()
    {
        $params = [
            'payment' => [
                'operation' => 'Test',
                'payeeInfo' => [
                    'payeeId' => PAYEE_ID
                ]
            ],
        ];

        $this->expectException(ClientException::class);
        $this->client->post('/psp/creditcard/payments', $params);
    }

    public function testPatch()
    {
        $this->expectException(ClientException::class);
        $this->client->patch(
            '/psp/creditcard/payments/instrumentData/5a17c24e-d459-4567-bbad-aa0f17a76119',
            []
        );
    }

    public function testDelete()
    {
        $this->expectException(ClientException::class);
        $this->client->delete(
            '/psp/creditcard/payments'
        );
    }

    public function testPut()
    {
        $this->expectException(ClientException::class);
        $this->client->put(
            '/psp/creditcard/payments',
            []
        );
    }

    public function testGet()
    {
        $this->expectException(ClientException::class);
        $this->client->get(
            '/psp/creditcard/payments'
        );
    }
}
