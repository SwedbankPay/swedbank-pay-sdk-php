<?php

namespace PayEx\Api\Service\Consumer\Request;

use PayEx\Api\Service\Request;

class InitiateConsumerSession extends Request
{
    public function setup()
    {
        $this->setRequestMethod('POST');
        $this->setRequestEndpoint('/psp/consumers');
        $this->setServiceOperation('initiate-consumer-session');
    }
}
