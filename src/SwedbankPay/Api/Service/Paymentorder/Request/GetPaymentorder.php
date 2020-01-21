<?php

namespace PayEx\Api\Service\Paymentorder\Request;

use PayEx\Api\Service\Request;

class GetPaymentorder extends Request
{
    public function setup()
    {
        $this->setRequestMethod('GET');
        $this->setRequestEndpoint('/psp/paymentorders/%s');
    }

    /**
     * @return array
     */
    public function getUrls()
    {
        return $this->getRequestResource()->__toArray()['payment_order']['urls'];
    }
}
