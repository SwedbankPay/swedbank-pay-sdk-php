<?php

namespace PayEx\Api\Service\Paymentorder\Request;

use PayEx\Api\Service\Request;

class CurrentPayment extends Request
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
        return $this->setRequestEndpoint($paymentId);
    }
}
