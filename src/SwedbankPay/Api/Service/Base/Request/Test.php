<?php

namespace SwedbankPay\Api\Service\Base\Request;

use SwedbankPay\Api\Client\Client;
use SwedbankPay\Api\Service\Request;
use SwedbankPay\Api\Client\Exception;

abstract class Test
{
    /**
     * Send request to test.
     *
     * @param string $accessToken
     * @param string $payeeId
     * @param bool $isTest
     * @param Request $request
     * @throws Exception
     */
    public function sendRequest($accessToken, $payeeId, $isTest, Request $request)
    {
        $client = new Client();
        $client->setAccessToken($accessToken)
            ->setPayeeId($payeeId)
            ->setMode($isTest ? Client::MODE_TEST : Client::MODE_PRODUCTION);

        $request->setClient($client);

        try {
            $request->send();
        } catch (Exception $e) {
            if (400 === $e->getCode()) {
                return;
            }

            switch ($e->getCode()) {
                case 401:
                    throw new Exception('Something is wrong with the credentials.');
                case 403:
                    throw new Exception('Something is wrong with the contract.');
            }
        }

        throw new Exception('API test has been failed.');
    }
}
