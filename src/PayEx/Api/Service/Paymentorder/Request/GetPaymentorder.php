<?php

namespace PayEx\Api\Service\Paymentorder\Request;

use PayEx\Api\Service\Request;

class GetPaymentorder extends Request
{
    public function setup()
    {
        $this->setRequestMethod('GET');
    }

    /**
     * @param string $paymentId
     */
    public function setPaymentId($paymentId)
    {
        return $this->setRequestEndpoint('/psp/paymentorders/' . $paymentId);
    }

    /**
     * @return array
     */
    public function getUrls()
    {
        return $this->getRequestResource()->__toArray()['payment_order']['urls'];
    }
}
