<?php

namespace SwedbankPay\Api\Service\Paymentorder\Request;

use SwedbankPay\Api\Service\Base\Request\Test as BaseTest;
use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderObject;
use SwedbankPay\Api\Service\Paymentorder\Resource\PaymentorderPayeeInfo;
use SwedbankPay\Api\Service\Paymentorder\Resource\Request\Paymentorder;
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
        $payeeInfo = new PaymentorderPayeeInfo();
        $payeeInfo->setPayeeId($payeeId);

        $paymentOrder = new Paymentorder();
        $paymentOrder->setOperation('Purchase')
            ->setPayeeInfo($payeeInfo);

        $paymentOrderObject = new PaymentorderObject();
        $paymentOrderObject->setPaymentorder($paymentOrder);

        $purchaseRequest = new Purchase($paymentOrderObject);
        $this->sendRequest($accessToken, $payeeId, $isTest, $purchaseRequest);
    }
}
