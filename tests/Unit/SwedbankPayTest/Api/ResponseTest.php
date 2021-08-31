<?php
// phpcs:ignoreFile -- this is test

namespace SwedbankPayTest\Api;

use SwedbankPay\Api\Client\Exception;
use SwedbankPay\Api\Response;

class ResponseTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var string
     */
    protected $callbackResponse;

    public function setUp(): void
    {
        $this->callbackResponse =
            '{
                "payment": {
                    "id": "/psp/creditcard/payments/1a23bc45-6789-0a12-ab12-1a23bc45de67",
                    "number": 40000000123
                },
                "transaction": {
                    "id": "/psp/creditcard/payments/1a23bc45-6789-0a12-ab12-1a23bc45de67/authorizations/1a23bc45-6789-0a12-ab12-1ab2c3def456",
                    "number": 40000000456
                }
            }';
    }

    public function testData()
    {
        $response = new Response($this->callbackResponse);

        $this->assertIsString($response->toJson());
        $this->assertIsString($response->__toString());

        $this->assertNull(
            $response->__set('test', 'test')
        );
        $this->assertEquals('test', $response->__get('test'));
        $this->assertEquals(true, $response->__isset('test'));

        $this->assertNull(
            $response->__unset('test', 'test')
        );
        $this->assertEquals(false, $response->__isset('test'));

        $this->assertNull(
            $response->offsetSet('test', 'test')
        );
        $this->assertEquals('test', $response->offsetGet('test'));
        $this->assertEquals(true, $response->offsetExists('test'));

        $this->assertNull(
            $response->offsetUnset('test', 'test')
        );
        $this->assertEquals(false, $response->offsetExists('test'));

        $this->assertEquals(false, $response->__call('hasTest', []));
    }

    public function testGetOperationByRel()
    {
        $response = new Response($this->callbackResponse);

        $this->assertEquals(false, $response->getOperationByRel('invalid'));
    }

    /**
     * @throws Exception
     */
    public function testResponseInstance()
    {
        $response = new Response($this->callbackResponse);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals($this->callbackResponse, $response->getBody());
        $this->assertEquals(json_decode($this->callbackResponse, true), $response->toArray());
    }

    /**
     * @throws Exception
     */
    public function testOffsetGetReturnsFieldFromJson()
    {
        $responseObject = json_decode($this->callbackResponse, true);
        $transaction = $responseObject['transaction'];

        $response = new Response($this->callbackResponse);

        $this->assertEquals($transaction, $response->offsetGet('transaction'));
    }

    /**
     * @throws Exception
     */
    public function testOffsetGetReturnsNullForNonExistingField()
    {
        $response = new Response($this->callbackResponse);

        $this->assertEquals(null, $response->offsetGet('authorization'));
    }

    /**
     * @throws Exception
     */
    public function testResponseThrowsExceptionWithEmptyBody()
    {
        $this->expectException(Exception::class);

        $response = new Response('');
        $this->assertInstanceOf(Response::class, $response);
    }
}
