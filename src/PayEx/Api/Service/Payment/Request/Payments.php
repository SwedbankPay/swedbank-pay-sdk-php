<?php

namespace PayEx\Api\Service\Payment\Request;

use PayEx\Api\Service\Request;

class Payments extends Request
{
    /**
     * @return $this
     */
    public function setup()
    {
        return $this->setRequestMethod('GET');
    }

    /**
     * @param string $paymentId
     * @return $this
     */
    public function setPaymentId($paymentId)
    {
        return $this->setRequestEndpoint($paymentId);
    }
}
