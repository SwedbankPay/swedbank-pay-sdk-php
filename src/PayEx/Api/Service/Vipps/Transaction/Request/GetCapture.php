<?php

namespace PayEx\Api\Service\Vipps\Transaction\Request;

use PayEx\Api\Service\Request;

class GetCapture extends Request
{
    public function setup()
    {
        $this->setRequestMethod('GET');
        $this->setRequestEndpoint('/psp/vippsv1/payments/%s/captures/%s');
    }
}
