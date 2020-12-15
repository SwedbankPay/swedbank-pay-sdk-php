<?php

namespace SwedbankPay\Api\Service\Creditcard\Request;

use SwedbankPay\Api\Service\Base\Request\Test as BaseTest;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentPayeeInfo;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentPurchase;
use SwedbankPay\Api\Service\Creditcard\Resource\Request\PaymentPurchaseObject;
use SwedbankPay\Api\Client\Exception;

class Test extends BaseTest
{
    /**
     * Test constructor.
     * @param string $accessToken
     * @param string $payeeId
     * @param bool $isTest
     * @throws Exception
     */
    public function __construct($accessToken, $payeeId, $isTest)
    {
        /**
         * Perform a POST request to create a payment with invalid data that is known to fail with
         * 400 Bad Request.
         * This is to ensure that no payments or payment orders are actually created if the request succeeds.
         * If the request fails with 401, something is wrong with the credentials.
         * If the request fails with 403 something is wrong with the contract.
         * If the request fails with 400 Bad Request, credentials and contracts should be OK.
         */
        $payeeInfo = new PaymentPayeeInfo();
        $payeeInfo->setPayeeId($payeeId);

        $payment = new PaymentPurchase();
        $payment->setOperation('Test')
            ->setPayeeInfo($payeeInfo);

        $paymentObject = new PaymentPurchaseObject();
        $paymentObject->setPayment($payment);

        $request = new Purchase($paymentObject);
        $this->sendRequest($accessToken, $payeeId, $isTest, $request);
    }
}
