<?php

namespace SwedbankPay\Api\Service\Paymentorder\Request;

use SwedbankPay\Api\Service\Request;

class UnscheduledPurchase extends Request
{
    public function setup()
    {
        $this->setRequestMethod('POST');
        $this->setRequestEndpoint('/psp/paymentorders');
        $this->setServiceOperation('UnscheduledPurchase');
    }

    /**
     * @return array
     */
    public function getUrls()
    {
        return $this->getRequestResource()->__toArray()['paymentorder']['urls'];
    }
}
