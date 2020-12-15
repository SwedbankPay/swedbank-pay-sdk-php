<?php

namespace SwedbankPay\Api\Service\Paymentorder\Request;

use SwedbankPay\Api\Service\Request;

class GetPaymentorder extends Request
{
    public function setup()
    {
        $this->setRequestMethod('GET');
    }

    /**
     * @return array
     */
    public function getUrls()
    {
        return $this->getRequestResource()->__toArray()['payment_order']['urls'];
    }
}
