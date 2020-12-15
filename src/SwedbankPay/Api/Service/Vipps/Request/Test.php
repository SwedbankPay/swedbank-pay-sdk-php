<?php

namespace SwedbankPay\Api\Service\Vipps\Request;

use SwedbankPay\Api\Service\Base\Request\Test as BaseTest;
use SwedbankPay\Api\Service\Vipps\Resource\Request\PaymentPayeeInfo;
use SwedbankPay\Api\Service\Vipps\Resource\Request\Payment;
use SwedbankPay\Api\Service\Vipps\Resource\Request\VippsPaymentObject;
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

        $paymentObject = new VippsPaymentObject();
        $paymentObject->setPayment($payment);

        $request = new Purchase($paymentObject);
        $this->sendRequest($accessToken, $payeeId, $isTest, $request);
    }
}
