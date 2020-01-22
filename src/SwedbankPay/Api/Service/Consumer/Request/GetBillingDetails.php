<?php

namespace SwedbankPay\Api\Service\Consumer\Request;

use SwedbankPay\Api\Service\Request;

class GetBillingDetails extends Request
{
    public function setup()
    {
        $this->setRequestMethod('GET');
        $this->setRequestEndpoint('/psp/consumers/%s/billing-details');
    }
}
