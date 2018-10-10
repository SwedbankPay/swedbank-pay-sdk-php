<?php

class PurchaseTest extends TestCase
{
    public function testPurchase()
    {
        $amount = 100;
        $params = [
            'payment' => [
                'operation'            => 'Purchase',
                'intent'               => 'Authorization',
                'currency'             => 'SEK',
                'prices'               => [
                    [
                        'type'      => 'Visa',
                        'amount'    => round($amount * 100),
                        'vatAmount' => '0'
                    ],
                    [
                        'type'      => 'MasterCard',
                        'amount'    => round($amount * 100),
                        'vatAmount' => '0'
                    ]
                ],
                'description'          => 'Order #123',
                'payerReference'       => '128adfca-ba08-4e91-aaa2-00409dcc287d',
                'generatePaymentToken' => false,
                'pageStripdown'        => false,
                'userAgent'            => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.92 Safari/537.36',
                'language'             => 'en-US',
                'urls'                 => [
                    'completeUrl' => 'http://localhost.no/return',
                    'cancelUrl'   => 'http://localhost.no/cancel',
                    'callbackUrl' => 'http://localhost.no/callback'
                ],
                'payeeInfo'            => [
                    'payeeId'        => PAYEE_ID,
                    'payeeReference' => 'ef291c34-0343-481b-b563-0a629d57c62c',
                ],
                'creditCard'           => [
                    'no3DSecure' => false
                ]
            ]
        ];

        $result = $this->client->request('POST', '/psp/creditcard/payments', $params);

        $this->assertInstanceOf('\PayEx\Api\Response', $result);
        $this->assertTrue(isset($result['payment']));
        $this->assertTrue(isset($result['payment']['id']));
        $this->assertTrue($result['payment']['operation'] === 'Purchase');
    }
}
