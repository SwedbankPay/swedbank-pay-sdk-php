<?php

namespace SwedbankPay\Api\Service\Consumer\Request;

use SwedbankPay\Api\Service\Request;

class InitiateConsumerSession extends Request
{
    public function setup()
    {
        $this->setRequestMethod('POST');
        $this->setRequestEndpoint('/psp/consumers');
        $this->setServiceOperation('initiate-consumer-session');
    }
}
