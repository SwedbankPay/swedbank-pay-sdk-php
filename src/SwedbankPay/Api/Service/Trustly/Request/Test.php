<?php

namespace SwedbankPay\Api\Service\Trustly\Request;

use SwedbankPay\Api\Service\Base\Request\Test as BaseTest;
use SwedbankPay\Api\Service\Trustly\Resource\Request\PaymentPayeeInfo;
use SwedbankPay\Api\Service\Trustly\Resource\Request\Payment;
use SwedbankPay\Api\Service\Trustly\Resource\Request\PaymentObject;
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
        $payeeInfo = new PaymentPayeeInfo();
        $payeeInfo->setPayeeId($payeeId);

        $payment = new Payment();
        $payment->setOperation('Test')
            ->setPayeeInfo($payeeInfo);

        $paymentObject = new PaymentObject();
        $paymentObject->setPayment($payment);

        $request = new Purchase($paymentObject);
        $this->sendRequest($accessToken, $payeeId, $isTest, $request);
    }
}
