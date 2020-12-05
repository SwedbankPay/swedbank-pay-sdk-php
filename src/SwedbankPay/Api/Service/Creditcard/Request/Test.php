<?php

namespace SwedbankPay\Api\Service\Creditcard\Request;

use SwedbankPay\Api\Client\Client;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentPayeeInfo;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentPurchase;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentPurchaseObject;
use SwedbankPay\Api\Client\Exception;

class Test
{
    /**
     * Test constructor.
     * @param string $merchantToken
     * @param string $payeeId
     * @param bool $isTest
     * @throws Exception
     */
    public function __construct($merchantToken, $payeeId, $isTest = true)
    {
        /**
         * Perform a POST request to create a payment with invalid data that is known to fail with
         * 400 Bad Request.
         * This is to ensure that no payments or payment orders are actually created if the request succeeds.
         * If the request fails with 401, something is wrong with the credentials.
         * If the request fails with 403 something is wrong with the contract.
         * If the request fails with 400 Bad Request, credentials and contracts should be OK.
         */

        $client = new Client();
        $client->setMerchantToken($merchantToken)
            ->setPayeeId($payeeId)
            ->setMode($isTest ? Client::MODE_TEST : Client::MODE_PRODUCTION);

        $payeeInfo = new PaymentPayeeInfo();
        $payeeInfo->setPayeeId($payeeId);

        $payment = new PaymentPurchase();
        $payment->setOperation('Test')
            ->setPayeeInfo($payeeInfo);

        $paymentObject = new PaymentPurchaseObject();
        $paymentObject->setPayment($payment);

        $request = new Purchase($paymentObject);
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