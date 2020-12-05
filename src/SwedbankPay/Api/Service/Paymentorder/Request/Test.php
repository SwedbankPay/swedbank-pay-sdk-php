<?php

namespace SwedbankPay\Api\Service\Paymentorder\Request;

use SwedbankPay\Api\Client\Client;
use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderObject;
use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderPayeeInfo;
use SwedbankPay\Api\Service\Paymentorder\Resource\Request\Paymentorder;
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
        $client = new Client();
        $client->setMerchantToken($merchantToken)
            ->setPayeeId($payeeId)
            ->setMode($isTest ? Client::MODE_TEST : Client::MODE_PRODUCTION);

        $payeeInfo = new PaymentorderPayeeInfo();
        $payeeInfo->setPayeeId($payeeId);

        $paymentOrder = new Paymentorder();
        $paymentOrder->setOperation('Purchase')
            ->setPayeeInfo($payeeInfo);

        $paymentOrderObject = new PaymentorderObject();
        $paymentOrderObject->setPaymentorder($paymentOrder);

        $purchaseRequest = new Purchase($paymentOrderObject);
        $purchaseRequest->setClient($client);

        try {
            $purchaseRequest->send();
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
